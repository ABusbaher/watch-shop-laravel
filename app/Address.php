<?php

namespace App;

use App\Order;
use App\Customer;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'id','state','city', 'address', 'postal_code'
    ];

    public $timestamps = false;

    public function users_adr()
    {
        return $this->hasMany('App\User');
    }

    public function customers_adr()
    {
        return $this->hasMany('App\Customer');
    }

    public function orders_a()
    {
        return $this->hasMany('App\Order');
    }
}
