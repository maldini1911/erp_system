<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignClient extends Model
{
    protected  $table = 'campaign_clients';
    protected  $fillable = ['client_id', 'user_id', 'campaign_id', 'campaign_type'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function facebook_coustmer_campaign()
    {
        return $this->belongsTo('App\Models\FacebookCoustmerCampaign');
    }

    public function facebook_our_campaign()
    {
        return $this->belongsTo('App\Models\FacebookOurCampaign');
    }

    public function google_coustmer_campaign()
    {
        return $this->belongsTo('App\Models\GoogleCoustmerCampaign');
    }

    public function google_our_campaign()
    {
        return $this->belongsTo('App\Models\GoogleOurCampaign');
    }
}
