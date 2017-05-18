<?php

namespace App;

use App\Size;
use App\Gender;
use App\Image;
use App\Brand;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id','model','brand_id','description',
        'price','sale','gender_id','size_id'
    ];

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
}
