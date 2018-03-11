<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $fillable = [
        'user_id',
        'card_name',
        'card_no',
        'valid_thru_month',
        'valid_thru_year',
        'card_pin',
    ];

    public function transactions() {
        return $this->hasManyThrough('App\Transaction', 'App\CardTransaction');
    }

    public function wallets() {
        return $this->hasMany('App\Wallet');
    }

    public function cardwallets() {
        return $this->hasManyThrough('App\Card', 'App\CardWallet');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
