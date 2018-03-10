<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    //
    protected $fillable = [
        'order_id',
        'item_id',
        'item_quantity',
    ];

    public function items() {
        return $this->hasMany('App\Item');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }
}
