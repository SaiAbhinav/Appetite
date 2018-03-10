<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function items() {
        return $this->hasMany('App\Item');
    }
}
