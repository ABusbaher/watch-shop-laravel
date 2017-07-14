<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected $fillable = [
        'id','order_id','product_id'
    ];

    protected $table = 'order-product';

    public function comments()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
