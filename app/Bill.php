<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $fillable = [
        'user_id',
        'order_id',
        'cgst',
        'sgst',
        'total',
        'status',
    ];

    public function orders() {
        return $this->belongsTo('App\Order');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
}
