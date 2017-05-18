<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'id','size'
    ];

    public function watches_s()
    {
        return $this->hasMany(Product::class);
    }
}
