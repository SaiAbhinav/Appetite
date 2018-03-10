<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proof extends Model
{
    //
    protected $fillable = [
        'user_id',
        'proof_type',        
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
