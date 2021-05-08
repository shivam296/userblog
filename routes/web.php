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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
 Route::get('/signup','SignupController@signupPage');
 Route::post('/user_registration','SignupController@registration');
 Route::post('/login','SignupController@login');
 Route::get('/logout','SignupController@logout');
 Route::middleware('UserBlog')->group(function ()
 {
  Route::get('/dashboard','UserBlogController@dashboardPage');
  Route::post('/UserDetail','UserBlogController@UserDetail');
  Route::get('UserDetail/delete/{id}','UserBlogController@UserdetailDelete');
  Route::get('Userblog/edit/{id}','UserBlogController@UserdetailEdit');
  Route::post('updatedata','UserBlogController@UserdetailUpdate');
 });
 