<?php

namespace App;

use App\Product;
use App\Customer;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id','total', 'customer_id',
        'user_id','qty','size','was_paid'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product','order-product','order_id','product_id')
            //->withPivot('model','slug')
            //->withTimestamps()
            ;
    }
}
