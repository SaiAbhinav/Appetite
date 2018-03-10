<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone_no',
        'area',
        'pin_code',
        'role_id',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function proof() {
        return $this->hasOne('App\Proof');
    }

    public function feedbacks() {
        return $this->hasMany('App\Feedback');
    }

    public function items() {
        return $this->hasManyThrough('App\Item', 'App\ItemUser');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function bills() {
        return $this->hasMany('App\Bill');
    }

    public function wallet() {
        return $this->hasOne('App\Wallet');        
    }

    public function cards() {
        return $this->hasMany('App\Card');
    }

    public function accounts() {
        return $this->hasMany('App\Account');
    }

    public function socialnetwork() {
        return $this->hasOne('App\SocialNetwork');
    }
}
