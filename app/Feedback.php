<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $fillable = [
        'user_id',
        'feedback_type',
        'feedback_content',
        'rating',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
