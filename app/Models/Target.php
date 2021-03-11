<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $table = "targets";
    protected  $fillable = ['total_clients', 'target', 'target_success', 'month', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
