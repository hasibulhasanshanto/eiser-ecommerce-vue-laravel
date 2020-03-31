<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('SuperAdminMiddleware');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereIn('role', [1, 2, 3])->latest()->get();
        return view('backend.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'role' => 'required',
            'status' => 'required',
        ]);

        $image = $request->file('image');
        $email = Str::lower($request->email);

        if(isset($image)){
            // make Unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $email.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Check is User Dir Exists??
            if(!Storage::disk('public')->exists('users')){

                Storage::disk('public')->makeDirectory('users');

            }
            // Resize image for User and Upload
            $userImg = Image::make($image)->resize('300','300')->stream();
            Storage::disk('public')->put('users/'. $imagename, $userImg);

        }
        else{
            $imagename = 'default.png';
        }

        //Save all to brand
        $user = new User();
        $user->name = Str::title($request->name);
        $user->username = Str::lower($request->username);
        $user->email = $email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->image = $imagename;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        if ($user) {
            Session::flash('flash_message', 'User successfully Created!');
            return redirect()->route('admin.user.index');
        } else {
            Session::flash('flash_message', 'Something Went Wrong :(');
            return redirect()->route('admin.user.index');
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
        $user = User::findOrFail($id);
        return view('backend.admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.admin.user.edit', compact('user'));
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
            'role' => 'required',
            'status' => 'required',
        ]);

        $image = $request->file('image');
        $email = Str::lower($request->email);
        $user = User::findOrFail($id);

        if(isset($image)){
            // make Unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $email.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Delete Old Image of brand if HAS:
            if(Storage::disk('public')->exists('users/'.$user->image)){

                Storage::disk('public')->delete('users/'.$user->image);
            }
            // Resize image for User and Upload
            $userImg = Image::make($image)->resize('300','300')->stream();
            Storage::disk('public')->put('users/'. $imagename, $userImg);

        }
        else{
            $imagename = $user->image;
        }

        //Save all to brand
        $user->name = Str::title($request->name);
        $user->username = Str::lower($request->username);
        $user->email = $email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->image = $imagename;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        if ($user) {
            Session::flash('flash_message', 'User successfully Updated!');
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
        $user = User::findOrFail($id);

        if(Storage::disk('public')->exists('users/'.$user->image )){

            Storage::disk('public')->delete('users/'.$user->image);
        }

        $user->delete();

        if ($user) {
            Session::flash('delete_message', 'User successfully Deleted!');
            return redirect()->route('admin.user.index');
        } else {
            Session::flash('delete_message', 'Something Went Wrong :(');
            return redirect()->route('admin.user.index');
        }
    }
}
