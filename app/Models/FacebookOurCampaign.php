<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacebookOurCampaign extends Model
{
    protected $table = 'facebook_our_campaigns';
    public $timestamp = true;
    protected $fillable = [
        'campaign_type', 'started', 'ended', 'full_budget', 'messages_quantity', 'reached', 'engagement', 'comments', 'likes', 'user_id', 'total_clicks',
        'page_likes', 'upload_screenshot', 'campaign_notes'
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
