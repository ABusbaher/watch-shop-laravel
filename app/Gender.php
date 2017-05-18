<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'id','name'
    ];

    public $timestamps = false;

    public function watches_g()
    {
        return $this->hasMany(Product::class);
    }
}
