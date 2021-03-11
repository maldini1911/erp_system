<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleCoustmerCampaign extends Model
{

    protected $table = 'google_coustmer_campaigns';
    public $timestamp = true;

    protected $fillable = [
        'client_id', 'campaign_type', 'started', 'ended', 'full_budget', 'custom_budget', 'campaign_notes',
        'impression', 'clicks', 'ctr', 'roi', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function manageclient()
    {
        return $this->belongsTo('App\Models\ManageClient', 'client_id', 'id');
    }

    public function campaign_client()
    {
        return $this->hasMany('App\Models\CampaignClient');
    }

}
