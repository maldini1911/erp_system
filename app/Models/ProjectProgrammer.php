<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectProgrammer extends Model
{
    protected $table = 'project_programmers';
    protected $fillable = ['user_id', 'project_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\ProgrammingProject');
    }
}
