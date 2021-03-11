<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';
    public $timestamps = true;

    protected $fillable = ['country_name'];

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

}
