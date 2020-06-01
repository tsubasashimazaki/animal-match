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

// ログインしていたら特定にidにはshowメソッド
// show{id}はusers/show/id
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('show/{id}', 'UserController@show')->name('users.show');
    Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('update/{id}', 'UserController@update')->name('users.update');
});


Route::get('/', function () {
    return view('top');
});
Route::get('thread', function() {
    return view('thread');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
