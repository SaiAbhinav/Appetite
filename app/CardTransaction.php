<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardTransaction extends Model
{
    //
    protected $fillable = [
        'card_id',
        'transaction_id',
        'amount_paid',
    ];

    public function cards() {
        return $this->hasMany('App\Card');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
}
