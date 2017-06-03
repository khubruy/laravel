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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', 'AdminPostsController@post')->name('home.post');

Route::group(['middleware'=>'admin'], function(){
    Route::resource('admin/users','AdminUsersController');

    Route::resource('admin/posts','AdminPostsController');

    Route::resource('admin/category','AdminCategoriesController');

    Route::resource('admin/media','AdminPhotosController');


    Route::get('/admin', function () {
        return view('layouts.admin');
    });

    Route::get('/admin/media/create', 'AdminPhotosController@create')->name('media.create');

    Route::resource('admin/comments','PostCommentsController');
    Route::resource('admin/comment/replies','CommentRepliesController');
});