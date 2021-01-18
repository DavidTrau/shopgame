<?php

namespace App\Http\Controllers\Account;

use App\Account;
use App\Admin;
use App\HistoryAccount;
use App\Http\Controllers\Controller;
use App\LuckyGift;
use App\Services\UserService;
use App\Services\WalletService;
use App\Setting;
use App\Transformer\Spin\AccountTransformer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $account;
    private $user;
    private $historyAccount;
    private $admin;
    private $setting;
    private $luckyGift;

    public function __construct(Account $account,
                                User $user,
                                HistoryAccount $historyAccount,
                                Admin $admin,
                                Setting $setting, LuckyGift $luckyGift)
    {
        $this->account = $account;
        $this->user = $user;
        $this->historyAccount = $historyAccount;
        $this->admin = $admin;
        $this->setting = $setting;
        $this->luckyGift = $luckyGift;
    }

    public function getListAccount(Request $request)
    {
        $category_id = $request->has('category_id') ? $request->input('category_id') : '';
        $page = $request->has('page') ? $request->input('page') : 1;
        $account = $this->account->where('category_id', $category_id)->offset(($page-1)*12)->limit(12)->get()->toArray();
        return response()->json([
            'status' => 'success',
            'data' => $account
        ], 200);
    }

    public function getAccount($id)
    {
        $account = $this->account->find($id);
        if ($account === null) {
            return abort(404);
        }
        return view('account.show', compact('account'));
    }

    public function buyAccount($id)
    {
        // check status
        $account = $this->account->find($id);
        if (intval($account->status) !== 0) {
            return response()->json([
                'message' => 'Tài khoản đã bị mua hoặc đã bị đặt trước, xin liên hệ Admin.',
                'status'  => 'error'
            ], 500);
        }
        $total_money = Auth::user()->total_money;
        if ($total_money < $account->price) {
            return response()->json([
                'message' => 'Tài khoản không đủ tiền, hãy nạp thêm tiền để mua tài khoản.',
                'status'  => 'error'
            ], 500);
        }
        // change status account ==> 1
        $account->update([
            'status' => 1
        ]);
        // add data to history account
        $this->historyAccount->create([
            'user_id' => Auth::id(),
            'account_id' => $id,
        ]);
        // update total_money user
        UserService::minusMoney(Auth::id(), $account->price);
        plusCountSold($account->category_id);

        // update income admin
        if ($account->author_id != 0 || $account->author_id != '') {
            $admin = $this->admin->where('id', $account->author_id)->first();
            $newIncome = $admin->income + $account->price;
            $admin->update([
                'income' => $newIncome
            ]);
        }

        return response()->json([
            'message' => 'Mua tài khoản thành công',
            'success'
        ], 200);
    }

    public function historyAccountBought()
    {
        return view('account.bought');
    }

    public function historyAccountRandom()
    {
        return view('account.random');
    }

    public function historyAccountSpin()
    {
        return view('account.spin');
    }

    public function historyBox()
    {
        return view('account.box');
    }

    public function historySlotMachine()
    {
        return view('account.slot_machine');
    }

    public function historyFlipCard()
    {
        return view('account.flip_card');
    }

    public function checkBuy(Request $request, $id)
    {
        $account = $this->account->find($id);
        if (!$account) {
            return response()->json([
                'message' => 'Tài khoản không tồn tại.',
                'status' => 'success'
            ], 500);
        }
        $account = AccountTransformer::forCheckBuy($account);
        return view('account.popup.check_buy_popup', compact('account'));
    }

    public function showInfo($id)
    {
        $account = $this->account->find($id);
        $data = json_decode($account->data);
        return view('account.popup.info', compact('account', 'data'));
    }

    public function getGift()
    {
        // check có cấu hình
        $config = $this->setting->where('key', config('setting.LUCKY_MONEY'))->first();
        if (!$config) {
            return "Có lỗi.";
        }
        // check user has lucky money
        $check = $this->luckyGift->where('user_id', Auth::id())->count();
        if ($check) {
            return "Tài khoản đã nhận quà";
        }
        $config = json_decode($config->value);
        $value = $config->value;
        $description = $config->description;

        // add user to history
        $this->luckyGift->create([
            'user_id' => Auth::id(),
            'value' => $value
        ]);
        // add to wallet
        WalletService::updateKimCuong(Auth::id(), $value);
        return view('account.popup.get_gift', compact('description'));
    }

    public function checkGotLuckyMoney()
    {
        $check = $this->luckyGift->where('user_id', Auth::id())->count();
        if ($check) {
            return response()->json([
                'status' => true,
                'message' => 'Member got lucky money.'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Member not got lucky money.'
        ]);
    }
}
