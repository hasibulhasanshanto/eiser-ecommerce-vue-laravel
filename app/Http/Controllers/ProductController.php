<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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

        $singleProduct = Product::where('id', $id)->first();   
        //return $singleProduct; 
        return  response()->json([
            'singleProduct' => $singleProduct
        ]);
    }


}