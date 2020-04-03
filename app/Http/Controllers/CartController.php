<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        //return $request->all();
        $cartProduct = Product::findOrFail($request->id);
        Cart::add([
            'id'=> $request->id,
            'name'=> $cartProduct->pro_name,
            'price'=> $cartProduct->pro_price,
            'options' =>[
                'image'=> $cartProduct->pro_image
            ],
            'qty'=>  $request->qty,
            'weight'=> 0,
            'tax' => 0
        ]);

        return ['message'=>'ok'];
    }
    public function showCart(){
        $cartProducts = Cart::content();
        return response()->json([
            'cartProducts' => $cartProducts
        ], 200); //With status code 200
    }

    public function deleteCart($id){
        $cartDelete = Cart::remove($id);
        return response()->json([
            'cartDelete' => $cartDelete
        ],200);
    }
    public function updateCart(Request $request,$rowId){
        Cart::update($rowId, $request->qty);

        return ['message'=>'ok'];

    }
}