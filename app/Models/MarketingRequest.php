<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketingRequest extends Model
{
    protected $table = 'marketing_requests';
    public $timestamp = true;
    protected $fillable = ['hr_id', 'file_download', 'link_page', 'name_page', 'status', 'marketing_id',
        'client_whatsapp', 'client_website', 'platform', 'client_id',
        'client_youtube_channel', 'client_career', 'platform'
    ];


    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function hr()
    {
        return $this->belongsTo('App\User');
    }

    public function notes()
    {
        return $this->hasMany("App\Models\OrderRequestNotes");
    }

    public function facebook_coustmer_campaign()
    {
        return $this->hasMany('App\Models\FacebookCoustmerCampaign');
    }


}
