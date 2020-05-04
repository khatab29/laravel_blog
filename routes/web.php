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


Route::get('/{lang?}', 'HomeController@home')->name('welcome')->where('lang','ar|en') ;
Route::group(['prefix'=>'{lang}'], function (){
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






/*
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
