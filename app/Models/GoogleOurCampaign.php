<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleOurCampaign extends Model
{
    protected $table = 'google_our_campaigns';
    public $timestamp = true;

    protected $fillable = [
        'campaign_type', 'started', 'ended', 'full_budget', 'campaign_notes',
        'impression', 'clicks', 'ctr', 'roi', 'user_id', 'messages_quantity'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function campaign_client()
    {
        return $this->hasMany('App\Models\CampaignClient');
    }
}
