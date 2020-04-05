<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\FrontController;

class FrontController extends Controller
{
    public function index(){
        return view('frontend.pages.master');
    }
}