<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammingClient extends Model
{
    protected $table = "programming_clients";
    public $timestamp = true;
    protected $fillable = ['name', 'mobile', 'email', 'address'];

    public function programmingprojects()
    {
        return $this->hasMany('App\Models\ProgrammingProject');
    }
}
