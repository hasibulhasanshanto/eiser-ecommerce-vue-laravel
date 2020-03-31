<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.admin.category.index', compact('categories'));
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
            'cat_name' => 'required',
            'cat_desc' => 'required',
            'cat_image' => 'required|file|mimes:jpeg,png,jpg|max:1050',
            'cat_status' => 'required',
        ]);

        $image = $request->file('cat_image');
        $slug = Str::slug($request->cat_name);

        if(isset($image)){
            // make Unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Check is category Dir Exists??
            if(!Storage::disk('public')->exists('category')){

                Storage::disk('public')->makeDirectory('category');

            }
            // Resize image for category and Upload
            $category = Image::make($image)->resize('300','300')->stream();
            Storage::disk('public')->put('category/'. $imagename, $category);

        }
        else{
            $imagename = 'https://picsum.photos/300/300';
        }

        //Save all to category
        $category = new Category();
        $category->cat_name = Str::title($request->cat_name);
        $category->cat_slug = $slug;
        $category->cat_desc = $request->cat_desc;
        $category->cat_image = $imagename;
        $category->cat_status = $request->cat_status;
        $category->save();

        if ($category) {
            Session::flash('flash_message', 'Category successfully Created!');
            return redirect()->route('admin.category.index');
        } else {
            Session::flash('flash_message', 'Something Went Wrong :(');
            return redirect()->route('admin.category.index');
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
        $category = Category::findOrFail($id);
        return view('backend.admin.category.edit', compact('category'));
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
            'cat_name' => 'required',
            'cat_desc' => 'required',
            'cat_image' => 'file|mimes:jpeg,png,jpg|max:5050',
            'cat_status' => 'required',
        ]);

        $image = $request->file('cat_image');
        $slug = Str::slug($request->cat_name);
        $category = Category::findOrFail($id);

        if(isset($image)){
            // make Unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Check is category Dir Exists??
            if(!Storage::disk('public')->exists('category')){

                Storage::disk('public')->makeDirectory('category');
            }

            // Delete Old Image of Category if HAS:
            if(Storage::disk('public')->exists('category/'.$category->cat_image)){

                Storage::disk('public')->delete('category/'.$category->cat_image);
            }

            // Resize image for category and Upload
            $categoryImg = Image::make($image)->resize('300','300')->stream();
            Storage::disk('public')->put('category/'. $imagename, $categoryImg);

        }
        else{
            $imagename = $category->cat_image;
        }

        // Update all to category
        $category->cat_name = Str::title($request->cat_name);
        $category->cat_slug = $slug;
        $category->cat_desc = $request->cat_desc;
        $category->cat_image = $imagename;
        $category->cat_status = $request->cat_status;
        // return $category;
        $category->save();

        if ($category) {
            Session::flash('flash_message', 'Category successfully Updated!');
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
       $category = Category::findOrFail($id);

        if(Storage::disk('public')->exists('category/'.$category->cat_image )){

            Storage::disk('public')->delete('category/'.$category->cat_image);
        }

        $category->delete();

        if ($category) {
            Session::flash('delete_message', 'Category successfully Deleted!');
            return redirect()->route('admin.category.index');
        } else {
            Session::flash('delete_message', 'Something Went Wrong :(');
            return redirect()->route('admin.category.index');
        }

    }
}
