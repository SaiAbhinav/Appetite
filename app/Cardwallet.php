<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardwallet extends Model
{
    //
    protected $fillable = [
        'wallet_id',
        'card_no',
        'amount_added',
    ];

    public function cards() {
        return $this->hasMany('App\Card');
    }

    public function wallets() {
        return $this->hasMany('App\Wallet');
    }
}
