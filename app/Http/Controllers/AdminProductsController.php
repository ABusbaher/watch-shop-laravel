<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Gender;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $images = Image::select('name','product_id')->groupBy('product_id')->get();
        //$images = Image::select('name','product_id')->groupBy('product_id')->get()->toArray();
        //$images = DB::table('images')->distinct('product_id')->get();
        $watches = Product::orderBy('updated_at','desc')->paginate(6); */
        $watches =  DB::table('products')
            ->join('images', 'product_id', '=', 'products.id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('genders', 'genders.id', '=', 'products.gender_id')
            ->select('products.*', 'images.name AS image','images.product_id',
                'brands.name AS brand','genders.name AS gender')
            ->groupBy('images.product_id')
            ->orderBy('products.updated_at','desc')
            ->paginate(6);
        return view('admin.all_products',compact('watches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::pluck('name','id')->all();
        return view('admin.add_product',compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'brand_id' => 'required|min:3',
            'model' => 'required|min:5',
            'description' => 'required',
            'old_price' => 'required|numeric',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'name' => 'required|image|mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF'
        ]);
        $input = $request->except(['name']);
        if($request->has('sale')){
            $input['sale'] = $request->sale;
        }else{
            $input['sale'] = 0;
        }
        $brand = Brand::firstOrCreate(['name' => $request->brand_id]);
        $input['brand_id'] = $brand->id;
        $watch = Product::create($input);
        $file = $request->name;

        if($file){
            $name = uniqid().'-'.$file->getClientOriginalName();
            $request->name->move('src/images',$name);
        }
        $image = Image::create([
            'name'       => $name,
            'product_id' => $watch->id,
        ]);
        Session::flash('watch_created','Watch successfully created.');
        return redirect('admin/watches/'.$watch->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $watch = Product::findOrFail($id);
        $genders = Gender::pluck('name','id')->all();
        $images = Image::where('product_id',$id)->get();
        return view('admin.edit_product',compact('watch','images','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $watch = Product::findOrFail($id);
        $this->validate($request, [
            'brand_id' => 'required|min:3',
            'model' => 'required|min:5',
            'description' => 'required',
            'old_price' => 'required|numeric',
            'price' => 'required|numeric',
            'discount' => 'required|numeric'
        ]);
        $input = $request->all();
        if($request->has('sale')){
            $input['sale'] = 1;
        }else{
            $input['sale'] = 0;
        }
        $brand = Brand::firstOrCreate(['name' => $request->brand_id]);
        $input['brand_id'] = $brand->id;
        $watch->update($input);
        Session::flash('watch_updated','Watch successfully updated');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return mixed
     */

    public function addImages(Request $request)
    {
        $file = $request->file('file');
        if($file){
            $name = uniqid().'-'.$file->getClientOriginalName();
            $request->file->move('src/images',$name);
            $input['file'] = $name;
        }
        $image = Image::create([
            'product_id'     =>  $request->input('product_id'),
            'name'      =>  $name,
        ]);
        return $image;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $watch = Product::findOrFail($id);
        $images = Image::where('product_id',$id)->get();

        foreach ($images as $image){
            unlink('src/images/'. $image->name);
            $image->delete();
        }

        $watch->delete();
        Session::flash('watch_deleted','Watch successfully deleted.');
        return redirect('admin/watches');
    }

    public function deleteImage($id){
        $image = Image::findOrFail($id);
        unlink('src/images/'. $image->name);
        $image->delete();
        return response()->json(['done']);
    }
}
