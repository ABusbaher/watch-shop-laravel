<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Support\Facades\View;
use App\Gender;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function home() {
        return view('frontend.home');
    }

    public function watchOnSale(){
        //$watches = Product::where('sale',1)->paginate(6)->get();
        $watches = Product::all();
        return view('frontend.sale',compact('watches'));
    }

    public function showCart() {
        return view('frontend.cart');
    }
    /*
    public function watchesByCategory($gender,$brand)
        {
            $watches = Product::where($gender->gender, $gender)
                ->where($brand->brand, $brand)
                ->paginate(6)->get();
        return view('frontend.watchesByCategory');
    }  */

}
