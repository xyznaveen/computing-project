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
      return redirect('home');
    }
    return view('welcome');
});

Route::get('/register', function() { return view('register'); })->name('register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/notification', 'NotificationController@index')->name('notification');
Route::get('/profile', 'User\ProfileController@loadProfile')->name('profile');

Route::post('user/post', ['uses' => 'User\PostController@newPost']);
Route::post('user/message', ['uses' => 'User\MessageController@newMessage']);

Route::get('/test', ['uses' => 'User\ProfileController@test']);

Route::get('/message', [
  'as' => 'message',
  'uses' => 'User\MessageController@index'
]);

Route::get('/user/{id}', [
  'uses' => 'User\ProfileController@getUser'
]);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/{csrft}/{user}/{post}', ['uses' => 'LikeController@newLike']);
Route::get('/do/comment/{postid}/{comment}', ['uses' => 'User\CommentController@newComment']);

Route::get('/user/{userid}/post/{postid}', ['uses' => 'User\PostController@index']);
Route::get('/get/message/{s}/{r}', ['uses'=>'User\MessageController@getMessages']);

// sending friend request

Route::get('/user/send/friend/request/to/{id}', ['uses' => 'User\FriendRequestController@sendRequest']);


// discover friends
Route::get('/discover', ['uses' => 'User\FriendController@index']);

// User settings
Route::get('/settings', ['uses' => 'SettingController@index'])->name('setting');


// ADMIN SECTION
Route::get('/admin/dashboard', ['middleware' => 'auth','uses'  =>  'Admin\DashBoardController@index'])->name('dboard');
Route::get('/admin/users', ['middleware' => 'auth','uses'  =>  'Admin\UsersController@index'])->name('ausers');
Route::get('/admin/complains', ['middleware' => 'auth','uses'  =>  'ReportController@index'])->name('flag');

// delte a user
Route::get('/{please}/{remove}/{me}/{from}/{your}/{system}/{id}', ['uses'	=>	'Admin\UsersController@remove'])->name('remu');

// updating user's info
Route::post('/update', ['uses'	=>	'UpdateController@update'])->name('proupdate');