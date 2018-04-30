<?php

namespace App;

use App\Size;
use App\Gender;
use App\Image;
use App\Brand;
use App\Comment;
use App\Order;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id','model','brand_id','description','slug',
        'price','sale','gender_id','old_price','discount'
    ];

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'model',
                'on_update' => true,
            ]
        ];
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function orders()
    {
        /*
        return $this->belongsToMany('App\Order')
            ->withPivot('paid','total')
            ->withTimestamps(); */
        return $this->belongsToMany('App\Order','order-product','order_id','product_id');
    }
}
