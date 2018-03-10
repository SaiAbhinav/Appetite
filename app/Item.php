<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'category_id',
        'type_id',
        'item_name',
        'rate',
        'description',
        'ingredients',
    ];

    public function users() {
        return $this->hasManyThrough('App\User', 'App\ItemUser');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function type() {
        return $this->belongsTo('App\Type');
    }

    public function orders() {
        return $this->hasManyThrough('App\Order', 'App\ItemOrder');
    }
}
