<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderRequestNotes extends Model
{
    protected $table = "order_request_notes";
    
    protected $fillable = ['note', 'order_request_marketing_id', 'order_request_programming_id'];

    public function order_request_marketing()
    {
        return $this->belongsTo('App\Models\MarketingRequest');
    }
}
