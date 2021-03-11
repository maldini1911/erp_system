<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammingRequest extends Model
{
    protected $table = 'programming_requests';

    protected $fillable = ['client_id', 'hr_id', 'status', 'client_whatsapp', 'client_website', 'client_career'];


    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function hr()
    {
        return $this->belongsTo('App\User');
    }

    public function notes()
    {
        return $this->hasMany("App\Models\OrderRequestNotes");
    }

    public function programming_project()
    {
        return $this->hasMany("App\Models\ProgrammingProject");
    }

}
