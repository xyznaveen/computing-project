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
    if(Auth::check()){
      return view('home');
    }
    return view('welcome');
});

Route::get('/register', function() { return view('register'); })->name('register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'User\ProfileController@loadProfile')->name('profile');

Route::post('user/post', ['uses' => 'User\PostController@newPost']);
