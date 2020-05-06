<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function checkout(){
        if (!Session::get('customerId')) {
            return view('frontend.checkout.checkout_login');
        } else {
            return redirect('/');
        }
        
       
    }
    public function orderSuccess(){
        return view('frontend.checkout.order_success');
    }
}