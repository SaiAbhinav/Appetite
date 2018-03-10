<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemUser extends Model
{
    //
    protected $fillable = [
        'user_id',
        'item_id',        
    ];

    public function users() {
        return $this->hasMany('App\User');
    }

    public function items() {
        return $this->hasMany('App\Item');
    }
}
