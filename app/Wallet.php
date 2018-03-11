<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //
    protected $fillable = [
        'user_id',
        'wallet_balance',        
    ];

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function accounts() {
        return $this->hasManyThrough('App\Account', 'App\AccountWallet');
    }

    public function cardwallets() {
        return $this->hasManyThrough('App\Card', 'App\CardWallet');
    }
}
