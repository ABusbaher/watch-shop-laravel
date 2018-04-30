<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Comment;
use App\Image;
use App\Like;
use App\Mail\ContactUsMail;
use App\Product;
use App\Reply;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

    public function contactUs(){
        return view('frontend.contactUs');
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
        //single watch
        $watch = Product::where('slug', $slug)->first();
        if(!$watch){
            return redirect('/index');
        }
        $gender = $watch->gender->name;
        $brand = $watch->brand->slug;

        $images = Image::where('product_id',$watch->id)->get();
        $comments = Comment::where('product_id',$watch->id)->get();
        /*   $repliess = $comments->pluck('id');
           $rep = $repliess->all();
           $replies = Reply::whereIn('comment_id', $rep)->get();
           foreach ($comments as $comment){
               $replies = Reply::where('comment_id',$comment->id)->get();
               //explode(',', $group->projects))
               dd($replies);
           }
           //$replies = Reply::where('comment_id',1)->get();
           //dd($replies);
          /* $comm_ids = $comments->pluck('id');
           $c = $comm_ids->all();
           $likes = Like::whereIn('comment_id', $c)->get();
           //dd($likes);*/

        //watches on sale(three newest)
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

    public function contact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'name' => 'required|min:5',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ]);
        $data = $request->all();

        $receiverAddress = 'b860174afc-ae4fab@inbox.mailtrap.io';
        Mail::to($receiverAddress)->send(new ContactUsMail($data));

        //other way
       /* Mail::send('mails.contactForm',  $data, function($message) use ($data)
        {
            $message->from($data->email);
            $message->to('b860174afc-ae4fab@inbox.mailtrap.io');
            $message->subject($data->subject);
        });*/
        return response()->json(['done']);
    }

}
