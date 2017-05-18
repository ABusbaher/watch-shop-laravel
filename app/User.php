<?php

namespace App;

use App\Order;
use App\Address;
use App\Role;
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
        'first_name','last_name','email', 'password','phone',
        'role_id','state','city','address','postal_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role','role_id');
    }

    public function address()
    {
        return $this->belongsTo('App\Address', 'address_id');
    }

    public function orders_u()
    {
        return $this->hasMany('App\Order');
    }
}
