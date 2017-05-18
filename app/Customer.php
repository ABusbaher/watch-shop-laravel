<?php

namespace App;

use App\Order;
use App\Address;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name','last_name','email', 'password','phone'
    ];

    public function address_c()
    {
        return $this->belongsTo('App\Address', 'address_id');
    }

    public function orders_c()
    {
        return $this->hasMany('App\Order');
    }
}
