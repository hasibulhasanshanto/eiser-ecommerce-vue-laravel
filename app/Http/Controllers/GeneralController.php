<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function unpublish($id){
        $category = Category::findOrFail($id);
        $category ->cat_status = 0;
        $category ->save();

        return back();
    }

    public function publish($id){
        $category = Category::findOrFail($id);
        $category ->cat_status = 1;
        $category ->save();

        return back();
    }
}
