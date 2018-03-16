<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Gallery;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Gallery $gallery)
    {
        return view('photos.index', compact(['gallery']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Gallery $gallery)
    {
        return view('photos.create', compact(['gallery']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Gallery $gallery)
    {
        $photo = \App\Photo::create([
            'title' => $request->title,
            'gallery_id' => $gallery->id,
        ]);

        $photo->setImage($request, 'image');

        return redirect()->route('photos.index', $gallery->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photos  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photos  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photos  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photos  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($gallery, Photo $photo)
    {
        $photo->removePhoto();
    }
}
