<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachmentUser extends Model
{
    protected $fillable = [
        'file', 'file_type', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
