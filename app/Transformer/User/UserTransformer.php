<?php

namespace App\Transformer\User;

class UserTransformer {
    public static function forDataTable($items)
    {
        if (!$items || count($items) === 0) {
            return [];
        }
        $result = [];
        foreach ($items as $item) {
            $temp = [
                'id' => $item->id,
                'name' => $item->name,
                'username' => $item->username,
                'email' => $item->email,
                'total_money' => $item->total_money,
                'kimcuong' => isset($item->wallet) ? $item->wallet->kimcuong : 0,
                'quanhuy' => isset($item->wallet) ? $item->wallet->quanhuy : 0,
            ];
            array_push($result, $temp);
        }
        return $result;
    }
}
