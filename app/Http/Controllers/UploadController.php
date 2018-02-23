<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UploadController extends Controller
{
    public function __construct ()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        \Auth::user()->setImage($request, 'userImage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGallery(Request $request)
    {
        // \Auth::user()->setImage($request, 'userImage');
        // \App\Gallery::gallery()->setImage($request, 'galleryImage');
        \App\Tag::setImage($request, 'galleryImage');
    }

    
}
