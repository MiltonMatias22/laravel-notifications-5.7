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

Route::resource('/posts', 'Posts\PostController');

Route::post('/comment', 'Posts\CommentController@store')->name('comment.store');

// notifications route
Route::get('notifications', 'NotificationController@notifications')->name('notifications');
// mark notifications as read
Route::put('notification-read', 'NotificationController@markAsRead');
