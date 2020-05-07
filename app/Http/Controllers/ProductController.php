<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        return view('public.master');
    }
    
    public function getFeaturesProduct(){

        $featured = Product::take(3)->get();        
        return  response()->json([
            'featured' => $featured
        ]);
    }

    public function newProduct(){

        $newProduct = Product::all()->random(4);        
        return  response()->json([
            'newProduct' => $newProduct
        ]);
    }

    public function inspireProduct(){

        $inspireProduct = Product::orderBy('id', 'desc')->take(8)->get();        
        return  response()->json([
            'inspireProduct' => $inspireProduct
        ]);
    }

    public function getAllcategory(){

        $allCategory = Category::orderBy('cat_name', 'asc')->get();        
        return  response()->json([
            'allCategory' => $allCategory
        ]);
    }
    public function getAllBrands(){

        $allBrand = Brand::orderBy('br_name', 'asc')->get();        
        return  response()->json([
            'allBrand' => $allBrand
        ]);
    }

    public function allProduct(){

        $allProduct = Product::orderBy('id', 'desc')->take(12)->get();        
        return  response()->json([
            'allProduct' => $allProduct
        ]);
    }
    public function singleProduct($id){

        $singleProduct = Product::with('category:id,cat_name', 'brand:id,br_name')->where('id', $id)->first(); 
        //return $singleProduct; 
        return  response()->json([
            'singleProduct' => $singleProduct 
        ]);
    }

    public function getCategoryProduct($id){
        $catProducts = DB::table('products') 
            ->join('categories','products.pro_category','categories.id')
            ->select('products.*', 'categories.cat_name')
            ->where('pro_category', $id)
            ->get(); 
        return  response()->json([
            'catProducts' => $catProducts
        ]);
    }
    public function getBrandProduct($id){
        $brandProducts = DB::table('products') 
            ->join('brands','products.pro_band','brands.id')
            ->select('products.*', 'brands.br_name')
            ->where('pro_band', $id)
            ->get(); 
            
        return  response()->json([
            'brandProducts' => $brandProducts
        ]);
    }


}