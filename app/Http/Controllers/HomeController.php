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

    public function gallery()
    {
        return view('photos.create');
    }

}
