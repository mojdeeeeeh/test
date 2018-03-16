<?php

Route::view('/new', 'new');
Route::get('/new/data', function(){
	return [
		'username' => 'ali',
		'password' => 1122
	];
});

// Route::view('/home', 'home');
Route::redirect('/', '/home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/posts', 'PostController');
Route::resource('/comments', 'CommentController');
Route::post('posts/{post}/comments', 'CommentController@store');
Route::post('/posts/{post}/comments', 'PostController@addComment');

Route::resource('/tags', 'TagController');
Route::get('/home', 'CommentController@index')->name('home');

Route::get('/dashboard-1', 'HomeController@dashboard1');
Route::get('/dashboard-2', 'HomeController@dashboard2');
// Route::get('/gallery', 'HomeController@gPage');
Route::get('/profile', 'HomeController@profile');
Route::resource('/galleries', 'GalleryController');
// Route::get('/gallery', 'GalleryController@gPage')->name('gPage');

Route::resource('/galleries/{gallery}/photos', 'PhotoController');

Route::post('/upload/user', 'UploadController@storeUser')
		->name('upload.user');


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
