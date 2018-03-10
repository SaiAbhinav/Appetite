<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $fillable = [
        'user_id',
        'account_no',
        'account_name',
        'account_balance',
        'account_password',        
    ];

    public function transactions() {
        return $this->hasManyThrough('App\Transaction', 'App\AccountTransaction');
    }

    public function wallets() {
        return $this->hasManyThrough('App\Wallet', 'App\AccountWallet');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
