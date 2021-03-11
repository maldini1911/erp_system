<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
      'name', 'category', 'package','register_date', 'recieve_date', 'note', 'status', 'price', 'paid', 'client_id', 'user_id'
    ];

    public function client()
    {
      return $this->belongsTo('App\Models\Client');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

}
