<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){ 
        $orders = Order::with('payment:id,payment_status','customer:id,full_name')->get(); 
        //return $orders;
        return view('backend.admin.order.index', compact('orders'));
    }

    public function show($id){
        return view('backend.admin.order.show');
    }
}