<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name','last_name','email','phone',
        'state','city','address','postal_code'
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
