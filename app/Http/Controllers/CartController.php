<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function showCart() {
        $cartItems = Cart::content();
        return view('frontend.cart',compact('cartItems'));
    }

    public function addToCart(Request $request) {
        $input = $request->all();
        $cart = Cart::add($input['product_id'], $input['model'], $input['quantity'], $input['price'], ['size' =>
            $input['size']])->associate('App\Product');
        return response()->json([$cart]);
    }

    public function deleteItem($id) {
        Cart::remove($id);
        return response()->json(['done']);
    }

    public function updateCart(Request $request,$rowId){
        //Cart::findOrFail($rowId);
        $updatedCart = Cart::update($rowId, $request->quantity);
        return response()->json([$updatedCart]);
    }

}
