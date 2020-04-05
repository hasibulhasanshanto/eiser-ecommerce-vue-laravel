<?php

namespace App\Http\Controllers;

use Mail;
use App\Customer;
use App\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{

    public function registerCustomer(Request $request){ 

        $request->validate([
            'f_name' => 'required|max:30',
            'l_name' => 'required|max:30', 
            'email' => 'required|unique:customers|max:70',
            'phone' => 'required|max:60',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
        ]);

        $customer = new Customer();
        $customer->f_name = Str::title($request->f_name);
        $customer->l_name = Str::title($request->l_name);
        $customer->full_name = Str::title($request->f_name.' '.$request->l_name);
        $customer->email = Str::lower($request->email);
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->password);
        $customer->address = $request->address;
        //return $customer;
        $customer->save();

        Session::put('customerId',$customer->id);
        Session::put('customerName',$customer->full_name);

        $data = $customer->toArray();
        Mail::send('frontend.mails.mail', $data, function ($message) use ($data){
            $message->to($data['email']);
            $message->subject('Welcome to Eiser Shop');
        });

        return redirect('/shipping');

    }

    public function shippingForm(){
        $customerId = Customer::find(Session::get('customerId'));
        return view('frontend.checkout.shipping',compact('customerId'));
    }

    public function checkoutShipping(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId',$shipping->id);
        //return 'success';
        return redirect('/payment');
    }

    public function paymentForm(){
        return view('frontend.checkout.payment');

        //return Cart::subtotal();
    }
}