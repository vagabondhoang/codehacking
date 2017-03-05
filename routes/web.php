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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/post/{id}', 'AdminPostsController@post')->name('home.post');

Route::get('/admin', function() {
	return view('admin.index');
});
Route::group(['prefix'=>'admin','middleware'=>'admin'], function(){

	Route::resource('users', 'AdminUsersController');
	Route::resource('posts', 'AdminPostsController');
	Route::resource('categories', 'AdminCategoriesController');
	Route::resource('media', 'AdminMediasController');
	Route::resource('comments', 'PostCommentsController');
	Route::resource('comment/replies', 'CommentRepliesController');

	Route::get('media/upload', 'AdminMediasController@show')->name('upload');

	

});

route::group(['middleware'=>'auth'], function(){

	Route::post('comment/reply', 'CommentRepliesController@createReply');
	Route::delete('media/delete', 'AdminMediasController@deleteMedia')->name('deleteMedia');

});


