<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonuseDiscount extends Model
{
    protected $fillable = [
        'bounse', 'discount', 'reason_bounse', 'reason_discount', 'user_id', 'month', 'amount'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
