<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Charge;
use App\FlipCardHistory;
use App\HistoryAccount;
use App\HistoryBox;
use App\HistoryRandom;
use App\HistorySlotMachine;
use App\HistorySpin;
use App\HistorySpinCoin;
use App\HistorySpinCoinTotal;
use App\Http\Controllers\Controller;
use App\RandomAccount;
use App\Transformer\Admin\AdminTransformer;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Admin;
use Auth;

class AdminController extends Controller
{
    private $historyAccount;
    private $historyRandom;
    private $historySpin;
    private $user;
    private $charge;
    private $admin;
    private $account;
    private $randomAccount;
    private $historySpinCoin;
    private $historyBox;
    private $historySlotMachine;
    private $historyFlipCard;

    public function __construct(
        HistoryAccount $historyAccount,
        HistoryRandom $historyRandom,
        HistorySpin $historySpin,
        HistorySpinCoin $historySpinCoin,
        User $user, Charge $charge, Admin $admin, Account $account,
        RandomAccount $randomAccount,
        HistoryBox $historyBox,
        HistorySlotMachine $historySlotMachine,
        FlipCardHistory $historyFlipCard
    )
    {
        $this->historyAccount = $historyAccount;
        $this->historyRandom = $historyRandom;
        $this->historySpin = $historySpin;
        $this->historySpinCoin = $historySpinCoin;
        $this->user = $user;
        $this->charge = $charge;
        $this->admin = $admin;
        $this->account = $account;
        $this->randomAccount = $randomAccount;
        $this->historyBox = $historyBox;
        $this->historySlotMachine = $historySlotMachine;
        $this->historyFlipCard = $historyFlipCard;

    }

    public function dashboard()
    {
        $admin = Auth::guard('admin')->user();
        if ($admin->is_super == 1) {

            $data_show = $this->createDataShow();
//            dd($data_show);

            // get total account sell
            $total_account = $this->historyAccount->count();

            // get total account random sell
            $total_random = $this->historyRandom->count();

            // get total charge day success
            $charge_day = $this->charge
                ->where('status', 2)
                ->whereDate('created_at', '=', date('Y-m-d'))
                ->get();
            $total_day = 0;
            foreach ($charge_day as $charge) {
                $total_day += $charge->amount;
            }
            // get total charge month success
            $charge_month = $this->charge
                ->where('status', 2)
                ->whereMonth('created_at', '=', date('m'))
                ->get();
            $total_month = 0;
            foreach ($charge_month as $charge) {
                $total_month += $charge->amount;
            }

            $userDay = $this->user->whereDay('created_at', '=', date('Y-m-d'))->count();
            $users_last = $this->user->orderBy('id', 'desc')->offset(0)->limit(5)->get();

            return view('admin.dashboard', compact(
                'total_account',
                'total_random','total_day', 'total_month', 'users_last', 'userDay', 'data_show'));
        } else {
            // get total account sell
            $total_account = $this->account->where('author_id', $admin->id)->where('status', 1)->count();

            // get total account random sell
            $total_random = $this->randomAccount->where('author_id', $admin->id)->where('status', 2)->count();

            // thu nhập
            $total_day = Auth::guard('admin')->user()->income;
            // thực nhận
            $total_month = $total_day * 0.4;

            return view('admin.dashboard', compact(
                'total_account',
                'total_random','total_day', 'total_month'));
        }
    }

    private function createDataShow()
    {
        // calculator account
        $total_acc_month = $this->historyAccount
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
        $total_acc_day = $this->historyAccount
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->count();

        // calculator random
        $total_random_month = $this->historyRandom
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
        $total_random_day = $this->historyRandom
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->count();

        // calculator random coin
        $total_random_coin_month = $this->historyBox
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
        $total_random_coin_day = $this->historyBox
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->count();

        // calculator spin
        $total_spin_month = $this->historySpin
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
        $total_spin_day = $this->historySpin
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->count();

        // calculator spin coin
        $total_spin_coin_month = $this->historySpinCoin
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
        $total_spin_coin_day = $this->historySpinCoin
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->count();

        // calculator slot machine
        $total_slot_machine_month = $this->historySlotMachine
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
        $total_slot_machine_day = $this->historySlotMachine
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->count();

        // calculator slot machine
        $total_flip_card_month = $this->historyFlipCard
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
        $total_flip_card_day = $this->historyFlipCard
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->count();

        // calculator month
        $charge_month = $this->charge
            ->where('status', 2)
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->get();
        $total_month = 0;
        foreach ($charge_month as $charge) {
            $total_month += $charge->amount;
        }
        // calculator day
        $charge_day = $this->charge
            ->where('status', 2)
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->get();
        $total_day = 0;
        foreach ($charge_day as $charge) {
            $total_day += $charge->amount;
        }

        // calculator spin
        $spin_month = $this->historySpin
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->get();
        $income_spin_month = 0;
        foreach ($spin_month as $spin) {
            $income_spin_month += $spin->price;
        }
        $spin_day = $this->historySpin
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->get();
        $income_spin_day = 0;
        foreach ($spin_day as $spin) {
            $income_spin_day += $spin->price;
        }

        // calculator spin coin
        $spin_coin_month = $this->historySpinCoin
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->get();
        $income_spin_coin_month = 0;
        foreach ($spin_coin_month as $spin) {
            $income_spin_coin_month += $spin->price;
        }
        $spin_coin_day = $this->historySpinCoin
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->get();
        $income_spin_coin_day = 0;
        foreach ($spin_coin_day as $spin) {
            $income_spin_coin_day += $spin->price;
        }

        // calculator slot machine
        $slot_machine_month = $this->historySlotMachine
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->get();
        $income_slot_machine_month = 0;
        foreach ($slot_machine_month as $slotMachine) {
            $income_slot_machine_month += $slotMachine->price;
        }
        $slot_machine_day = $this->historySpinCoin
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->get();
        $income_slot_machine_day = 0;
        foreach ($slot_machine_day as $spin) {
            $income_slot_machine_day += $spin->price;
        }

        // calculator slip card
        $flip_card_month = $this->historyFlipCard
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->get();
        $income_flip_card_month = 0;
        foreach ($flip_card_month as $flip_card) {
            $income_flip_card_month += $flip_card->price;
        }
        $flip_card_day = $this->historySpinCoin
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))
            ->get();
        $income_flip_card_day = 0;
        foreach ($flip_card_day as $flip_card) {
            $income_flip_card_day += $flip_card->price;
        }

        return [
            'total_acc_month' => $total_acc_month,
            'total_acc_day' => $total_acc_day,

            'total_random_month' => $total_random_month,
            'total_random_day' => $total_random_day,

            'total_random_coin_month' => $total_random_coin_month,
            'total_random_coin_day' => $total_random_coin_day,

            'total_spin_month' => $total_spin_month,
            'total_spin_day' => $total_spin_day,

            'total_spin_coin_month' => $total_spin_coin_month,
            'total_spin_coin_day' => $total_spin_coin_day,

            'total_slot_machine_month' => $total_slot_machine_month,
            'total_slot_machine_day' => $total_slot_machine_day,

            'total_flip_card_month' => $total_flip_card_month,
            'total_flip_card_day' => $total_flip_card_day,

            'total_month' => $total_month,
            'total_day' => $total_day,

            'income_spin_month' => $income_spin_month,
            'income_spin_day' => $income_spin_day,

            'income_spin_coin_month' => $income_spin_coin_month,
            'income_spin_coin_day' => $income_spin_coin_day,

            'income_slot_machine_month' => $income_slot_machine_month,
            'income_slot_machine_day' => $income_slot_machine_day,

            'income_flip_card_month' => $income_flip_card_month,
            'income_flip_card_day' => $income_flip_card_day
        ];
    }

    public function list(Request $request)
    {
        try {
            if ($request->has('type') && $request->type === 'json') {
                $draw = $request->has('sEcho') ? $request->input('sEcho') : 1;
                $offset = $request->has('iDisplayStart') ? $request->input('iDisplayStart') : 0;
                $limit = $request->has('iDisplayLength') ? $request->input('iDisplayLength') : 10;
                $sSearch = $request->has('sSearch') ? $request->input('sSearch') : '';
                $admins = $this->admin
                    ->where('name', 'like', "%{$sSearch}%")
                    ->orWhere('username', 'like', "%{$sSearch}%")
                    ->offset($offset)->limit($limit)
                    ->get();
                $count = $this->admin
                    ->where('username', 'like', "%{$sSearch}%")
                    ->orWhere('username', 'like', "%{$sSearch}%")
                    ->count();
                $data = AdminTransformer::forDataTable($admins);
                return response()->json([
                    'draw' => $draw,
                    'recordsTotal' => $count,
                    'recordsFiltered' => $count,
                    'data' => $data
                ], 200);
            }
            return view('admin.manager.index');
        } catch (\Exception $e) {
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }

    public function create(Request $request)
    {
        try {
            $item = $this->admin->newInstance();
            return view('admin.manager.create', compact('item'));
        } catch (\Exception $e) {
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }

    public function store(Request $request)
    {
        try {
            $params = $request->all();
            $params = AdminTransformer::forInsert($params);
            $admin = $this->admin->create($params);
            return redirect(asset('admin/list'));
        } catch (\Exception $e) {
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $admin = $this->admin->find($id);
            $item = AdminTransformer::forEdit($admin);
            return view('admin.manager.edit', compact('item'));
        } catch (\Exception $e) {
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $params = $request->all();
            if (array_key_exists('is_super', $params) && $params['is_super'] == 1) {
                $params['is_super'] = true;
            } else {
                $params['is_super'] = false;
            }
            $item = $this->admin->find($id);
            if (!$item) return redirect(asset(''));
            $result = $item->update($params);
            return redirect(asset('admin/list'));
        } catch (\Exception $e) {
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $item = $this->admin->find($id);
            if (!$item) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Lỗi, xin thử lại',
                    'text' => 'Xin mời thử lại'
                ]);
            }
            $item->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Xóa Cộng tác viên thành công',
            ]);
        } catch (\Exception $e) {
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }

    public function checkUnique(Request $request)
    {
        try {
            $username = $request->has('username') ? $request->input('username') : '';
            $count = $this->admin->where('username', $username)->count();
            if ($count > 0) {
                return 'false';
            } else {
                return 'true';
            }
        } catch (\Exception $e) {
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }

    public function getChangePass(Request $request, $id)
    {
        try {
            $item = $this->admin->find($id);
            if (!$item) return redirect(asset(''));
            return view('admin.manager.change_pass', compact('item'));
        } catch (\Exception $e) {
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }

    public function postChangePass(Request $request, $id)
    {
        try {
            $params = $request->all();
            if ($request->password !== $request->passwordConfirm) {
                return redirect(asset(''));
            }
            $item = $this->admin->find($id);
            $item->update([
                'password' => bcrypt($params['password'])
            ]);
            return redirect(asset('admin/list'));
        } catch (\Exception $e) {
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }

    public function resetIncome(Request $request, $id)
    {
        try {
            $item = $this->admin->find($id);
            if (!$item) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Lỗi, xin thử lại',
                    'text' => 'Xin mời thử lại'
                ]);
            }
            $item->update([
                'income' => 0
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Reset thu nhập cho CTV thành công.',
            ]);
        } catch (\Exception $e) {
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }
}
