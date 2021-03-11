<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $table = 'commissions';
    protected $fillable = ['commission', 'client_id', 'month', 'user_id'];

    public  function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public  function user()
    {
        return $this->belongsTo('App\User');
    }
}
