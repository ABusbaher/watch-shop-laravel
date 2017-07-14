<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'username','email','comment_text',
        'product_id','created_at','updated_at'
    ];


    public function comments()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
