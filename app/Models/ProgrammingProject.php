<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammingProject extends Model
{
    protected $table = 'programming_projects';
    public $timestamp = true;
    protected $fillable = ['project_name', 'client_id', 'project_type', 'project_price', 'amount_paid', 'remaining_amount', 'start_resgister', 'finish_resgister', 'date_start', 'date_line',
                            'project_level', 'project_status', 'project_url_demo', 'project_url_domin', 'project_ftp', 'project_upload', 'count_programmers', 'user_id', 'teaster_id'
                          ];


    public function programming_request()
    {
        return $this->belongsTo('App\Models\ProgrammingRequest', 'client_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project_programmers()
    {
        return $this->hasMany('App\Models\ProjectProgrammer');
    }
}
