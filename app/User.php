<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'image', 'address', 'date_start', 'number_cart', 'salary', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\ClientNote');
    }

    public function  bonusesdiscounts()
    {
        return $this->hasMany('App\Models\BonuseDiscount');
    }

    public function  attachments()
    {
    return $this->hasMany('App\Models\AttachmentUser');
    }

    public function manageclients()
    {
        return $this->hasMany('App\Models\ManageClient');
    }

    public function facebookcoustmercampaign()
    {
        return $this->hasMany('App\Models\FacebookCoustmerCampaign');
    }

    public function facebookourcampaign()
    {
        return $this->hasMany('App\Models\FacebookOurCampaign');
    }

    public function googlecoustmercampaign()
    {
        return $this->hasMany('App\Models\GoogleCoustmerCampaign');
    }

    public function googleourcampaign()
    {
        return $this->hasMany('App\Models\GoogleOurCampaign');
    }

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function programmingprojects()
    {
        return $this->hasMany('App\Models\ProgrammingProject');
    }

    public function projectprogrammers()
    {
        return $this->hasMany('App\Models\ProjectProgrammer');
    }

    public function marketingrequests()
    {
        return $this->hasMany('App\Models\MarketingRequest');
    }

    public function commissions()
    {
        return $this->hasMany('App\Models\Commission');
    }

    public function targets()
    {
        return $this->hasMany('App\Models\Target');
    }

    public function campaign_client()
    {
        return $this->hasMany('App\Models\CampaignClient');
    }

}
