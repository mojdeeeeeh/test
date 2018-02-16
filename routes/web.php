<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::redirect('/home', 'new');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/posts', 'PostController');
Route::resource('/comments', 'CommentController');
Route::post('posts/{post}/comments', 'CommentController@store');
Route::post('/posts/{post}/comments', 'PostController@addComment');

Route::resource('/tags', 'TagController');
Route::get('/home', 'CommentController@index');

Route::view('/dashboard-1', 'dashboard-1')->middleware('auth');
Route::view('/dashboard-2', 'dashboard-2')->middleware('auth');

Route::view('/testfile', 'testfile')->middleware('auth');

Route::resource('/photos', 'UploadController');

// Route::view('/new', 'new');

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
