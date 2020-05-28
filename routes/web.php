<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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


Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

		Auth::routes();
		Route::get('/', function () {return view('welcome');});
		Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function(){
		Route::get('/', 'admin\AdminController@index')->name('admin.home');
		Route::get('/login', 'admin\AdminLoginController@adminLoginForm')->name('admin.login.form');
        Route::post('login', 'admin\AdminLoginController@Adminlogin')->name('admin.login');



        Route::post('password/email', 'admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('password/reset', 'admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('password/reset','admin\ResetPasswordController@reset')->name('admin.password.update');
        Route::get('password/reset/{token}', 'admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

});


Route::group(['prefix' => 'posts'], function(){
	Route::get('/', 'PostController@index')->name('posts.index');
	Route::get('/{post}','PostController@show')->name('posts.show');
    Route::get('/{post}/edit','PostController@edit')->name('posts.edit');
    Route::PUT('/{post}/update', 'PostController@update')->name('posts.update');
    Route::delete('/{post}/delete', 'PostController@destroy')->name('posts.destroy');





});











});
