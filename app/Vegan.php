<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vegan extends Model
{
    //
    protected $fillable = [        
        'name',
    ];

    public function items() {
        return $this->hasMany('App\Items');
    }
}
