<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('frontend.checkout.stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from Eiser.com" 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return redirect('/order-success');
    }
}