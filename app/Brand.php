<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'id','name'
    ];

    public $timestamps = false;

    public function watches()
    {
        return $this->hasMany(Product::class);
    }
}
