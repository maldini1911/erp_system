<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientNote extends Model
{   
    protected $table = 'client_notes';
    
    protected $fillable = [
        'client_id', 'user_id', 'note'
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
