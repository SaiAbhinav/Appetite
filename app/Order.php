<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id',
    ];

    public function items() {
        return $this->hasManyThrough('App\Item', 'App\ItemOrder');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function bill() {
        return $this->hasOne('App\Bill');
    }
}
