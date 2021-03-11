<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    protected $table = 'project_tasks';
    protected $fillable = ['project_id', 'programmer_id', 'tester_id', 'task_name', 'task_dateline', 'status_task', 'status_check_tester'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\ProgrammingProject');
    }
}
