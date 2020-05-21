<?php

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


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
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
        //'verify' => true
    ], function(){


    Route::get('/', 'PostController@index')->name('posts.index');
    Route::get('/homepage',function () {return view('homepage');})->name('homapage');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/register','Auth\RegisterController@create')->name('register');
    Route::post('register','Auth\RegisterController@store')->name('register.post');
    
    Route::get('/login','Auth\LoginController@create')->name('login');
    Route::post('login','Auth\LoginController@login')->name('login.post');
    Route::post('logout','Auth\LoginController@logout')->name('logout');
    Route::get('/password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('/password/reset', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    
    



     
    Route::get('/posts/{post}','PostController@show')->name('posts.show');
    Route::get('/posts/{post}/edit','PostController@edit')->name('posts.edit');
    Route::PUT('/posts/{post}/update', 'PostController@update')->name('posts.update');
    Route::delete('/posts/{post}/delete', 'PostController@destroy')->name('posts.destroy');




    Route::group(['prefix'=>'admin'],function (){
        //Config::set('auth.defaults.guard', 'admin');
        //dd(Config::get('auth.defaults.guard'));
        Route::get('/','AdminController@index')->name('admin.home');
        Route::get('/login','Admin\AdminLoginController@create')->name('admin.login');
        Route::post('login','Admin\AdminLoginController@Admlogin')->name('admin.submit');
        Route::post('logout','Admin\AdminLoginController@logout')->name('admin.logout');
        Route::get('/reset', function () {return view('auth.passwords.adminEmail'); })->name('admin.password.request');

        });


    
        

    });

    
    

    
    

   


/*
Route::get('/{lang?}', 'HomeController@home')->name('welcome')->where('lang','ar|en') ;
Route::group(['prefix'=>'{lang}'], function (){

   
    Route::get('/posts','PostController@index')->name('posts'); 
    Route::get('/posts/{id}','PostController@show')->name('posts.show');  

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register','Auth\RegisterController@create')->name('register');
Route::post('register','Auth\RegisterController@store')->name('register.post');
Route::get('/login','Auth\LoginController@create')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::post('logout','Auth\LoginController@logout')->name('logout');


Route::get('/reset',function () {
    return view('auth.passwords.email');
})->name('password.email');



});







Route::prefix('{lang?}')->middleware('locale')->group(function() {
Route::get('/', function () {return view('welcome');})->name('home');
});
Route::prefix('{lang}')->middleware('locale')->group(function() {
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/404', function () {
    return view('404');
})->name('admin.404');

Route::get('/500', function () {
    return view('500');
})->name('admin.500');




});




Route::prefix('{lang?}')->middleware('locale')->group(function() {
Route::get('/', function () {return view('welcome');})->name('home');
});

Route::prefix('{lang}')->middleware('locale')->group(function() {


    Route::get('/login', 'SessionsController@create')->name('login');
    Route::post('login', 'SessionsController@store')->name('login.post');
    Route::get('/logout', 'SessionsController@destroy')->name('logout');

    Route::get('/register', 'RegisterController@create')->name('register');
    Route::post('register', 'RegisterController@store')->name('register.post');


    Route::get('/reset',array( 'as'=>'reset',function () {
        return view('auth.reset');
    }));

});










/*Route::get('/homepage', function () {
    return view('homePage');
})->name('admin');

Route::get('login/register','UsersController@create')->name('admin.register');
Route::post('login/register','UsersController@store');

Route::get('login/forgot-password', function () {
    return view('ForgotPassword');
})->name('admin.forgotPassword');


Route::get('/404', function () {
    return view('404');
})->name('admin.404');


Route::get('/500', function () {
    return view('500');
})->name('admin.500');*/
