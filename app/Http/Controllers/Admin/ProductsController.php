<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('cat_status', 1)->orderBy('cat_name')->get();
        $brands = Brand::where('br_status', 1)->orderBy('br_name')->get();

        //$products = Product::latest()->get();
        $products = DB::table('products')
            ->join('brands', 'brands.id', '=','products.pro_band')
            ->join('categories', 'categories.id', '=','products.pro_category')
            ->select('products.*', 'brands.br_name', 'categories.cat_name')
            ->orderBy('id', 'desc')
        ->get();

        return view('backend.admin.product.index', compact('categories', 'brands', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pro_name' => 'required',
            'pro_band' => 'required',
            'pro_category' => 'required',
            'pro_price' => 'required',
            'pro_qty' => 'required',
            'pro_size' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'pro_image' => 'required|image|mimes:jpeg,jpg,png',
            'pro_g_image' => 'required',
            'pro_g_image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'pro_status' => 'required',
        ]);

        $image = $request->file('pro_image');
        $slug = Str::slug($request->pro_name);

        if(isset($image)){
            // make Unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Check is Product Dir Exists??
            if(!Storage::disk('public')->exists('product')){

                Storage::disk('public')->makeDirectory('product');
            }
            // Resize image for Product and Upload
            $bandImg = Image::make($image)->resize('350','420')->stream();
            Storage::disk('public')->put('product/'. $imagename, $bandImg);

        }
        else{
            $imagename = 'https://picsum.photos/300/300';
        }

        $gal_image = $request->file('pro_g_image');
        $slug = Str::slug($request->pro_name);

        if(isset($gal_image)){

            // Check is Product Dir Exists??
            if(!Storage::disk('public')->exists('product/gallery')){

                Storage::disk('public')->makeDirectory('product/gallery');
            }
            //Store Multiple images to product/gallery/
            foreach($gal_image as $image){
                // make Unique name for image
                $currentDate = Carbon::now()->toDateString();
                $gimagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                // Resize image for Product and Upload
                $gallImg = Image::make($image)->resize('350','420')->stream();
                Storage::disk('public')->put('product/gallery/'. $gimagename, $gallImg);

                $data[] = $gimagename;

            }
        }
        //Save all to Product
        $product = new Product();
        $product->pro_name = Str::title($request->pro_name);
        $product->user_id = Auth::user()->id;
        $product->user_role = Auth::user()->role;
        //$category->cat_slug = $slug;
        $product->pro_band = $request->pro_band;
        $product->pro_category = $request->pro_category;
        $product->pro_price = $request->pro_price;
        $product->pro_offprice = $request->pro_offprice;
        $product->pro_qty = $request->pro_qty;
        $product->pro_size = $request->pro_size;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->pro_image = $imagename;
        $product->pro_g_image = json_encode($data);
        $product->pro_status = $request->pro_status;

        $product->save();

        if ($product) {
            Session::flash('flash_message', 'Product successfully Created!');
            return redirect()->route('admin.product.index');
        } else {
            Session::flash('flash_message', 'Something Went Wrong :(');
            return redirect()->route('admin.product.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::where('cat_status', 1)->orderBy('cat_name')->get();
        $brands = Brand::where('br_status', 1)->orderBy('br_name')->get();
        //$product = Product::findOrFail($id);
        $product = DB::table('products')
            ->join('brands', 'brands.id', '=','products.pro_band')
            ->join('categories', 'categories.id', '=','products.pro_category')
            ->select('products.*', 'brands.br_name', 'categories.cat_name')
            ->where('products.id', $id)
        ->first();
        return view('backend.admin.product.show', compact('categories', 'brands', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('cat_status', 1)->orderBy('cat_name')->get();
        $brands = Brand::where('br_status', 1)->orderBy('br_name')->get();

        $product = Product::findOrFail($id);
        return view('backend.admin.product.edit', compact('categories', 'brands', 'product'));
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
        $request->validate([
            'pro_name' => 'required',
            'pro_band' => 'required',
            'pro_category' => 'required',
            'pro_price' => 'required',
            'pro_offprice' => 'required',
            'pro_qty' => 'required',
            'pro_size' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'pro_image' => 'image',
            'pro_g_image.*' => 'image',
            'pro_status' => 'required',
        ]);

        //return $request->all();

        $image = $request->file('pro_image');
        $slug = Str::slug($request->pro_name);
        $product = Product::findOrFail($id);

        if(isset($image)){
            // make Unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Delete Old Image of Product if HAS:
            if(Storage::disk('public')->exists('product/'.$product->pro_image)){

                Storage::disk('public')->delete('product/'.$product->pro_image);
            }
            // Resize image for Product and Upload
            $bandImg = Image::make($image)->resize('300','300')->stream();
            Storage::disk('public')->put('product/'. $imagename, $bandImg);
        }
        else{
            $imagename = $product->pro_image;
        }

        $gal_image = $request->file('pro_g_image');
        $slug = Str::slug($request->pro_name);

        if(isset($gal_image)){
            //Delete Multiple images from product/gallery/
            if(Storage::disk('public')->exists('product/gallery/'.$product->image)){

                foreach (json_decode($product->pro_g_image) as $gallery) {
                Storage::disk('public')->delete('product/gallery/'.$gallery);
                }
            }
            //Update Multiple images to product/gallery/
            foreach($gal_image as $image){
                // make Unique name for image
                $currentDate = Carbon::now()->toDateString();
                $gimagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                // Resize image for Product and Upload
                $gallImg = Image::make($image)->resize('300','300')->stream();
                Storage::disk('public')->put('product/gallery/'. $gimagename, $gallImg);

                $data[] = $gimagename;

            }
            $data = json_encode($data);
        }
        else{
            $data = $product->pro_g_image;
        }

        //Save all to Product
        $product->pro_name = Str::title($request->pro_name);
        //$category->cat_slug = $slug;
        $product->pro_band = $request->pro_band;
        $product->pro_category = $request->pro_category;
        $product->pro_price = $request->pro_price;
        $product->pro_offprice = $request->pro_offprice;
        $product->pro_qty = $request->pro_qty;
        $product->pro_size = $request->pro_size;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->pro_image = $imagename;
        $product->pro_g_image = $data;
        $product->pro_status = $request->pro_status;

        $product->save();

        if ($product) {
            Session::flash('flash_message', 'Product successfully Updated!');
            return redirect()->back();
        } else {
            Session::flash('flash_message', 'Something Went Wrong :(');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if(Storage::disk('public')->exists('product/'.$product->pro_image )){

            Storage::disk('public')->delete('product/'.$product->pro_image);
        }

        if(Storage::disk('public')->exists('product/gallery/'.$product->image)){

            foreach (json_decode($product->pro_g_image) as $gallery) {
               Storage::disk('public')->delete('product/gallery/'.$gallery);
            }

        }

        $product->delete();

        if ($product) {
            Session::flash('delete_message', 'Product successfully Deleted!');
            return redirect()->route('admin.product.index');
        } else {
            Session::flash('delete_message', 'Something Went Wrong :(');
            return redirect()->route('admin.product.index');
        }

    }

    public function unpublish($id){
        $product = Product::findOrFail($id);
        $product ->pro_status = 0;
        $product ->save();
        return back();
    }

    public function publish($id){
        $product = Product::findOrFail($id);
        $product ->pro_status = 1;
        $product ->save();
        return back();
    }

}
