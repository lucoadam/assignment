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

Route::post ( '/login', 'MainController@login' );
Route::get ( '/login', 'MainController@loginForm' )->name('login');
Route::post ( '/register', 'MainController@register' );
Route::get ( '/register', 'MainController@registerForm' );
Route::get ( '/logout', 'MainController@logout' );

Route::group(['middleware'=>'auth'],function(){
   Route::get('dashboard','MainController@dashboard');
   Route::resource('profile','ProfileController')->except(['create','index','store','destroy','show']);
    Route::resource('user','UserController');
    Route::resource('goods','GoodsController');
    Route::resource('brand','BrandController');
    Route::resource('categories','CategoriesController');
    Route::get('notify',function(){
        auth()->user()->notify(new \App\Notifications\NewUserRegistered);
    });
});