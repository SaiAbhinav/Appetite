<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountWallet extends Model
{
    //
    protected $fillable = [
        'wallet_id',
        'bank_name',
        'user_acc_name',
        'amount_added',
    ];

    public function accounts() {
        return $this->hasMany('App\Account');
    }

    public function wallets() {
        return $this->hasMany('App\Wallet');
    }
}
