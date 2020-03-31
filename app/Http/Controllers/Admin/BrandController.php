<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend.admin.brand.index', compact('brands'));
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
            'br_name' => 'required',
            'br_desc' => 'required',
            'br_image' => 'required|file|mimes:jpeg,png,jpg|max:1050',
            'br_status' => 'required',
        ]);

        $image = $request->file('br_image');
        $slug = Str::slug($request->br_name);

        if(isset($image)){
            // make Unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Check is brand Dir Exists??
            if(!Storage::disk('public')->exists('brand')){

                Storage::disk('public')->makeDirectory('brand');

            }
            // Resize image for brand and Upload
            $brandImg = Image::make($image)->resize('300','300')->stream();
            Storage::disk('public')->put('brand/'. $imagename, $brandImg);

        }
        else{
            $imagename = 'https://picsum.photos/300/300';
        }

        //Save all to brand
        $brand = new Brand();
        $brand->br_name = Str::title($request->br_name);
        $brand->br_slug = $slug;
        $brand->br_desc = $request->br_desc;
        $brand->br_image = $imagename;
        $brand->br_status = $request->br_status;
        $brand->save();

        if ($brand) {
            Session::flash('flash_message', 'Brand successfully Created!');
            return redirect()->route('admin.brand.index');
        } else {
            Session::flash('flash_message', 'Something Went Wrong :(');
            return redirect()->route('admin.brand.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.admin.brand.edit', compact('brand'));
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
            'br_name' => 'required',
            'br_desc' => 'required',
            'br_image' => 'file|mimes:jpeg,png,jpg',
            'br_status' => 'required',
        ]);

        $image = $request->file('br_image');
        $slug = Str::slug($request->br_name);
        $brand = Brand::findOrFail($id);

        if(isset($image)){
            // make Unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Delete Old Image of brand if HAS:
            if(Storage::disk('public')->exists('brand/'.$brand->br_image)){

                Storage::disk('public')->delete('brand/'.$brand->br_image);
            }

            // Resize image for brand and Upload
            $brandImg = Image::make($image)->resize('300','300')->stream();
            Storage::disk('public')->put('brand/'. $imagename, $brandImg);

        }
        else{
            $imagename = $brand->br_image;
        }

        // Update all to brand
        $brand->br_name = Str::title($request->br_name);
        $brand->br_slug = $slug;
        $brand->br_desc = $request->br_desc;
        $brand->br_image = $imagename;
        $brand->br_status = $request->br_status;
        // return $brand;
        $brand->save();

        if ($brand) {
            Session::flash('flash_message', 'Brand successfully Updated!');
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
        $brand = Brand::findOrFail($id);

        if(Storage::disk('public')->exists('brand/'.$brand->br_image )){

            Storage::disk('public')->delete('brand/'.$brand->br_image);
        }

        $brand->delete();

        if ($brand) {
            Session::flash('delete_message', 'Brand successfully Deleted!');
            return redirect()->route('admin.brand.index');
        } else {
            Session::flash('delete_message', 'Something Went Wrong :(');
            return redirect()->route('admin.brand.index');
        }


    }

    public function unpublish($id){
        $brand = Brand::findOrFail($id);
        $brand ->br_status = 0;
        $brand ->save();

        return back();
    }

    public function publish($id){
        $brand = Brand::findOrFail($id);
        $brand ->br_status = 1;
        $brand ->save();

        return back();
    }
}
