<?php

namespace App\Http\Controllers;

use Mail;
use App\Order;
use App\Payment;
use App\Customer;
use App\Shipping;
use App\OrderDetails;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

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


    public function loginCustomer(Request $request){
        $customer = Customer::where('email', $request->email)->first();
        if ($customer) {
            if (password_verify($request->password, $customer->password)) {
                Session::put('customerId', $customer->id);
                Session::put('customerName', $customer->full_name);

                return redirect('/shipping');
            } else{
                return back()->with('message', 'Invalid Email or Password');
            }
        } else{
            return redirect()->back()->with('message', 'Invalid Email or Password');
        }
        
    }
    public function logoutCustomer(Request $request){
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/checkout');        
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

    public function confirmOrder(Request $request){
        $paymentType = $request->payment_info;
        if($paymentType == 'cash'){
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Cart::subtotal();
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_info = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach($cartProducts as $cartProduct){
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->id;
                $orderDetails->product_name = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->price;
                $orderDetails->product_quantity = $cartProduct->qty;
                $orderDetails->save();
            }
            Cart::destroy();

            return redirect('/order-success');
        }
        if($paymentType == 'stripe'){
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Cart::subtotal();
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_info = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach($cartProducts as $cartProduct){
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->id;
                $orderDetails->product_name = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->price;
                $orderDetails->product_quantity = $cartProduct->qty;
                $orderDetails->save();
            }
            Cart::destroy();

            return redirect('/stripe');
        }
    }
}