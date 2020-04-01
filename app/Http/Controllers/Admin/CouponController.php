<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('backend.admin.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|unique:coupons',
            'amount' => 'required',
            'amount_type' => 'required',
            'expire_date' => 'required',
            'status' => 'required',
        ]);
        
        //Save all to coupon
        $coupon = new Coupon();
        $coupon->coupon_code = strtoupper($request->coupon_code);
        $coupon->amount = $request->amount;
        $coupon->amount_type = $request->amount_type; 
        $coupon->expire_date = $request->expire_date;
        $coupon->status = $request->status;
        //return $request->all();
        $coupon->save();

        if ($coupon) {
            Session::flash('flash_message', 'Coupon successfully Created!');
            return redirect()->back();
        } else {
            Session::flash('flash_message', 'Something Went Wrong :(');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'coupon_code' => 'required',
            'amount' => 'required',
            'amount_type' => 'required',
            'expire_date' => 'required',
            'status' => 'required',
        ]);
        
        //Update all to coupon
        $coupon =  Coupon::findOrFail($id);
        $coupon->coupon_code = strtoupper($request->coupon_code);
        $coupon->amount = $request->amount;
        $coupon->amount_type = $request->amount_type; 
        $coupon->expire_date = $request->expire_date;
        $coupon->status = $request->status;
        //return $request->all();
        $coupon->save();

        if ($coupon) {
            Session::flash('flash_message', 'Coupon successfully Updated!');
            return redirect()->back();
        } else {
            Session::flash('flash_message', 'Something Went Wrong :(');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);

        $coupon->delete();

        if ($coupon) {
            Session::flash('delete_message', 'Coupon successfully Deleted!');
            return redirect()->route('admin.coupon.index');
        } else {
            Session::flash('delete_message', 'Something Went Wrong :(');
            return redirect()->route('admin.coupon.index');
        }
    }

    public function unpublish($id){
        $coupon = Coupon::findOrFail($id);
        $coupon ->status = 0;
        $coupon ->save();

        return back();
    }

    public function publish($id){
        $coupon = Coupon::findOrFail($id);
        $coupon ->status = 1;
        $coupon ->save();

        return back();
    }
}