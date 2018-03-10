<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    //
    protected $fillable = [
        'facebook',
        'twitter',
        'instagram',
        'pinterest',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
