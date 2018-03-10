<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountTransaction extends Model
{
    //
    protected $fillable = [
        'account_id',
        'transaction_id',
        'amount_paid',
    ];

    public function accounts() {
        return $this->hasMany('App\Account');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
}
