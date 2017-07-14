<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderProducts;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Stripe;

class OrderController extends Controller
{
    public function checkout() {
        $cartItems = Cart::content();
        return view('frontend.checkout',compact('cartItems'));
    }

    public function storeOrder(Request $request){
        $input = $request->all();
        /*** STORING CUSTOMER INFORMATION ***/
        $customer = Customer::firstOrCreate([
            'first_name' => $input['first_name'],
            'last_name'  => $input['last_name'],
            'phone'      => $input['phone'],
            'email'      => $input['email'],
            'state'      => $input['state'],
            'city'       => $input['city'],
            'address'    => $input['address'],
            'postal_code'=> $input['postal_code']
        ]);
        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {
            /*** STORING ORDER INFORMATION ***/
            $order = Order::create([
                'total' => $cartItem->qty * $cartItem->price,
                'customer_id' => $customer->id,
                'was_paid' => 0,
                'qty' => $cartItem->qty,
                'size' => $cartItem->options->size
            ]);
            /*** STORING ORDER-PRODUCTS RELATION ***/
            $orderProducts = OrderProducts::create([
                'order_id'   => $order->id,
                'product_id' => $cartItem->id
            ]);
        }
        Cart::destroy();
        Session::flash('order', 'You successfully ordered watch(es)! 
        Our employers will contact you for order confirmation soon. 
        Thank you for choosing our watch(es).');
        return redirect('index');
    }

    public function payment() {
        return view('frontend.payment');
    }

    public function storePayment(Request $request) {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_eSmIgBhEBlM53Y1VMGfnK62f");

        // Token is created using Stripe.js or Checkout!
        // Get the payment token submitted by the form:
        $token = $request->stripeToken;
        //dd($request->all());
        //dd($token);
        // Charge the user's card:
        $charge = \Stripe\Charge::create(array(
            "amount" => (Cart::subtotal()+10.00) * 100,
            "currency" => "usd",
            "description" => "Test charge",
            "source" => $token,
        ));

        /*** STORING CUSTOMER INFORMATION ***/
        $customer = Customer::firstOrCreate([
            'first_name' => Auth::user()->first_name,
            'last_name'  => Auth::user()->last_name,
            'phone'      => Auth::user()->phone,
            'email'      => Auth::user()->email,
            'state'      => Auth::user()->state,
            'city'       => Auth::user()->city,
            'address'    => Auth::user()->address,
            'postal_code'=> Auth::user()->postal_code
        ]);
        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {
            /*** STORING ORDER INFORMATION ***/
            $order = Order::create([
                'total' => $cartItem->qty * $cartItem->price,
                'customer_id' => $customer->id,
                'was_paid' => 1,
                'qty' => $cartItem->qty,
                'size' => $cartItem->options->size
            ]);
            /*** STORING ORDER-PRODUCTS RELATION ***/
            $orderProducts = OrderProducts::create([
                'order_id'   => $order->id,
                'product_id' => $cartItem->id
            ]);
        }

        Cart::destroy();
        Session::flash('order', 'You successfully ordered watch(es)! 
        Our employers will contact you for order confirmation soon. 
        Thank you for choosing our watch(es).');
        return redirect('index');
    }

    public function show_orders() {
        $orders =  Order::select()
            ->orderBy('updated_at','desc')
            ->paginate(10);
        return view('admin.orders',compact('orders'));
    }

    public function updatePayment(Request $request,$id){
        $payment = Order::findOrFail($id);
        $paid = $request->was_paid == 'yes' ?  1 : 0;
        $payment->was_paid = $paid;
        $payment->save();
        return response()->json([$payment]);
    }
}
