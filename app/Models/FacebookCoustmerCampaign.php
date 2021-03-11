<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacebookCoustmerCampaign extends Model
{
    protected $table = 'facebook_coustmer_campaigns';

    protected $fillable = [
        'client_id', 'campaign_type', 'started', 'ended', 'full_budget', 'custom_budget',
        'messages_quantity', 'reached', 'engagement', 'comments', 'likes', 'user_id', 'total_clicks',
        'page_likes', 'upload_screenshot', 'campaign_notes'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order_request_marketing()
    {
        return $this->belongsTo('App\Models\MarketingRequest', 'client_id');
    }

    public function campaign_client()
    {
        return $this->hasMany('App\Models\CampaignClient');
    }

}
