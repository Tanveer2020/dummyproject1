<?php

use Illuminate\Support\Facades\Route;

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





Route::post('contacts/{id}', "contactController@update");

Route::get('/', "userController@index");







//blading templating engine
Route::get('/profile/{id}/{email}', "userController@show");



//return $id. "=====".$email;

	//return view("profile");

Route::get('/welcome', "userController@welcome");
Route::get('/posts', "postsController@create");



Route::resource('contacts',"contactController")->middleware("auth");

//Route::post('/contacts', 'contactController@store');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


