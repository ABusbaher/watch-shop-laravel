<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'username','email','reply_text','id',
        'product_id','comment_id','created_at','updated_at'
    ];


    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function comments()
    {
        return $this->belongsTo(Comment::class,'comment_id');
    }

    public function likes()
    {
        return $this->hasOne('App\Like');
    }

}
