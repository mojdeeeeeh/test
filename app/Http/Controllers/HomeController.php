<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    //  public function gPage()
    // {
    //     $galleries = \App\Gallery::orderBy('created_at', 'desc')
    //                         ->paginate(6);

    //     return view('home', compact(['galleries']));
    // }
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
        return view('home', compact(['galleries']));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function dashboard1()
    {
        return view('dashboard-1');
    }

     public function dashboard2()
    {
        return view('dashboard-2');
    }

      public function profile()
    {
        return view('profile');
    }

    // public function gallery()
    // {
    //     return view('photos.create');
    // }

   
}
