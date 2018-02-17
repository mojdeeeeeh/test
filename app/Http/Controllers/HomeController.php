<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
   
    // public function fileUpload(Request $request)
    // {
    //     $this->validate($request, [
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $image = $request->file('image');
    //     $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
    //     $destinationPath = public_path('/images');
    //     $image->move($destinationPath, $input['imagename']);

    //     $this->postImage->add($input);

    //     return back()->with('success','Image Upload successful');
    // }

    public function dashboard1()
    {
        return view('dashboard-1');
    }
     public function dashboard2()
    {
        return view('dashboard-2');
    }

}
