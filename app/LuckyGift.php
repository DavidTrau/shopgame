<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuckyGift extends Model
{
    protected $table = 'lucky_gifts';

    protected $fillable = [
        'user_id',
        'value'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
