<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTelesales extends Model
{
    protected $table = 'setting_telesales';
    public $timestamps = true;

    protected $fillable = [
        'commission', 'target'
    ];
}
