<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

        protected $table = 'clients';
        public $timestamps = true;

      protected $fillable = [
          'name', 'phone', 'phone2','landline', 'email', 'country_id', 'source', 'response',
          'meeting_client', 'user_id', 'position', 'telesales_data', 'from_user_id', 'price'
      ];


      public function user()
      {
        return $this->belongsTo('App\User');
      }

    public function marketer()
    {
        return $this->belongsTo('App\User', 'from_user_id');
    }

      public function Projects()
      {
        return $this->hasMany('App\Models\Project');
      }

      public function nodes()
      {
        return $this->hasMany('App\Models\ClientNode');
      }

      public function country()
      {
          return $this->belongsTo('App\Models\Country');
      }

      public function manageclient()
      {
        return $this->hasMany('App\Models\ManageClient');
      }

      public function commissions()
      {
          return $this->hasMany('App\Models\Commission');
      }

      public function campaign_client()
      {
          return $this->hasMany('App\Models\CampaignClient');
      }

}
