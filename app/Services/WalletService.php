<?php

namespace App\Services;

use App\Wallet;

class WalletService
{

    // get info wallet
    public static function getWallet($user_id)
    {
        return Wallet::where('user_id', $user_id)->first();
    }

    // update kimcuong
    public static function updateKimCuong($user_id, $value)
    {
        $wallet = Wallet::where('user_id', $user_id)->first();
        if ($wallet) {
            $wallet->update([
                'kimcuong' => $wallet->kimcuong + $value,
            ]);
        } else {
            Wallet::create([
                'user_id' => $user_id,
                'kimcuong' => $value,
                'quanhuy' => 0,
            ]);
        }
    }

    // update quanhuy
    public static function updateQuanHuy($user_id, $value)
    {
        $wallet = Wallet::where('user_id', $user_id)->first();
        if ($wallet) {
            $wallet->update([
                'quanhuy' => $wallet->quanhuy + $value,
            ]);
        } else {
            Wallet::create([
                'user_id' => $user_id,
                'kimcuong' => 0,
                'quanhuy' => $value,
            ]);
        }
    }
}
