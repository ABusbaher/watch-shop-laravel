<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Brand extends Model
{
    protected $fillable = [
        'id','name','slug'
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
                'source' => 'name',
                'on_update' => true,
            ]
        ];
    }

    public $timestamps = false;

    public function watches()
    {
        return $this->hasMany(Product::class);
    }
}
