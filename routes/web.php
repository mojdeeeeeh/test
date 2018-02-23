<?php

Route::view('/home', 'home');
Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/posts', 'PostController');
Route::resource('/comments', 'CommentController');
Route::post('posts/{post}/comments', 'CommentController@store');
Route::post('/posts/{post}/comments', 'PostController@addComment');

Route::resource('/tags', 'TagController');
Route::get('/home', 'CommentController@index');

Route::get('/dashboard-1', 'HomeController@dashboard1');
Route::get('/dashboard-2', 'HomeController@dashboard2');
Route::get('/profile', 'HomeController@profile');
Route::get('/gallery', 'HomeController@gallery');

Route::post('/upload/user', 'UploadController@storeUser')
		->name('upload.user');
Route::post('/upload/gallery', 'UploadController@storeGallery');


    // Route::get('image',['as'=>'getimage','uses'=>'ImageController@getImage']);
    // Route::post('image',['as'=>'postimage','uses'=>'ImageController@postImage']);

// Route::get('fileentry', 'FileentryController@index');
// Route::get('fileentry/get/{filename}', [
// 	'as' => 'getentry', 'uses' => 'FileentryController@get']);
// Route::post('fileentry/add',[ 
//         'as' => 'addentry', 'uses' => 'FileentryController@add']);

// // for image upload view
// Route::post('/upload', 'UploadController@view');
// // for image upload
// Route::post('/upload', 'UploadController@upload');
 
//
