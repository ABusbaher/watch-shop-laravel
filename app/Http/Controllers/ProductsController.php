<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Comment;
use App\Image;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Gender;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductsController extends Controller
{
    public function home() {
        $watches =  DB::table('products')
            ->join('images', 'product_id', '=', 'products.id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('genders', 'genders.id', '=', 'products.gender_id')
            ->select('products.*', 'images.name AS image','images.product_id',
                'brands.slug AS brand','genders.name AS gender')
            ->groupBy('images.product_id')
            ->where('products.sale',1)
            ->orderBy('products.updated_at','desc')
            ->limit(6)
            ->get();
        return view('frontend.home',compact('watches'));
    }

    public function watchOnSale(){
        $watches =  DB::table('products')
            ->join('images', 'product_id', '=', 'products.id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('genders', 'genders.id', '=', 'products.gender_id')
            ->select('products.*', 'images.name AS image','images.product_id',
                'brands.slug AS brand','genders.name AS gender')
            ->groupBy('images.product_id')
            ->where('products.sale',1)
            ->orderBy('products.updated_at','desc')
            ->paginate(6);
        return view('frontend.sale',compact('watches'));
    }

    public function watchesByCategory($gender,$brand)
        {
            $watches =  DB::table('products')
                ->join('images', 'product_id', '=', 'products.id')
                ->join('brands', 'brands.id', '=', 'products.brand_id')
                ->join('genders', 'genders.id', '=', 'products.gender_id')
                ->select('products.*', 'images.name AS image','images.product_id',
                    'brands.slug AS brand','genders.name AS gender')
                ->groupBy('images.product_id')
                ->where([
                    ['genders.name', $gender],
                    ['brands.slug', $brand],])
                ->orderBy('products.updated_at','desc')
                ->paginate(6);
        return view('frontend.watchesByCategory',compact('watches','gender','brand'));
    }

    public function singleWatch($gender,$brand, $slug){
        /*$page = Product::where('slug',$slug)
            ->whereHas('brand', function ($query) use ($brand) {
                $query->where($brand);
            })
            ->whereHas('gender', function ($query) use ($gender) {
                $query->where($gender);
            })->first()
        */
        $watch = Product::where('slug', $slug)->first();
        $gender = $watch->gender->name;
        $brand = $watch->brand->slug;

        $images = Image::where('product_id',$watch->id)->get();
        $comments = Comment::where('product_id',$watch->id)->get();

        $watches =  DB::table('products')
            ->join('images', 'product_id', '=', 'products.id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('genders', 'genders.id', '=', 'products.gender_id')
            ->select('products.*', 'images.name AS image','images.product_id',
                'brands.slug AS brand','genders.name AS gender')
            ->groupBy('images.product_id')
            ->where('products.sale',1)
            ->orderBy('products.updated_at','desc')
            ->limit(3)
            ->get();

        return view('frontend.singleWatch',compact('watch','gender','brand','images','watches','comments'));
    }

}
