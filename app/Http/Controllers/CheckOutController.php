<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function checkout(){
        return view('frontend.checkout.checkout_login');
    }
    public function orderSuccess(){
        return view('frontend.checkout.order_success');
    }
}