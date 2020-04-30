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



Route::redirect('/', App::getLocale());

Route::group(['prefix'=>'{lang}'], function (){

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/404', function () {
    return view('404');
})->name('admin.404');

Route::get('/500', function () {
    return view('500');
})->name('admin.500');




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
