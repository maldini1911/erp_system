<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageClient extends Model
{
    protected $table = 'manage_clients';
    public $timestamp = true;
    protected $fillable = [
        'client_whatsapp', 'client_website', 'platform', 'client_id',
        'client_youtube_channel', 'client_career', 'user_id', 'platform'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function marketingrequests()
    {
        return $this->hasMany('App\Models\MarketingRequest');
    }

    public function programmingrequests()
    {
        return $this->hasMany('App\Models\ProgrammingRequest');
    }

}
