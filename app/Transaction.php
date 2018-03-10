<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'bill_id',
        'transaction_type',
        'wallet_id',
        'amount_paid',
    ];

    public function bill() {
        return $this->belongsTo('App\Bill');
    }

    public function wallet() {
        return $this->belongsTo('App\Wallet');
    }

    public function cards() {
        return $this->hasManyThrough('App\Card', 'App\CardTransaction');
    }

    public function accounts() {
        return $this->hasManyThrough('App\Account', 'App\AccountTransaction');
    }
}
