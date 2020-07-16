<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale(),
	          'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
	    Auth::routes();
	    Route::get('/', 'PostController@index')->name('posts.index');
        Route::get('/home', 'HomeController@index')->name('home');

        Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {
		    Route::get('/', 'AdminController@index')->name('admin.home');
		    Route::get('/login', 'AdminLoginController@adminLoginForm')->name('admin.login.form');
            Route::post('login', 'AdminLoginController@adminlogin')->name('admin.login');
            Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')
            ->name('admin.password.email');
            Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')
            ->name('admin.password.request');
            Route::post('password/reset', 'ResetPasswordController@reset')->name('admin.password.update');
            Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')
            ->name('admin.password.reset');
        });

         Route::group(['prefix' => 'posts'], function () {
            Route::get('/export', 'PostController@postsExport')->name('posts.csv');
	        Route::get('/{post}', 'PostController@show')->name('posts.show');
            Route::get('/{post}/edit', 'PostController@edit')->name('posts.edit');
            Route::PUT('/{post}/update', 'PostController@update')->name('posts.update');
            Route::delete('/{post}/delete', 'PostController@destroy')->name('posts.destroy');
         });
    });
