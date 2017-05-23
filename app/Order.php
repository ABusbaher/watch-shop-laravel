<?php

namespace App;

use App\Product;
use App\Customer;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id','total', 'customer_id','user_id'
    ];

    public function user_o()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function customer_o()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function orderItems()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity','total');
    }
}
