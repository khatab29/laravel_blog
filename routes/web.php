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
    return view('login');
})->name('admin.login');

Route::get('/home', function () {
    return view('homePage');
})->name('admin');


Route::get('login/register', function () {
    return view('register');
})->name('admin.register');

Route::get('login/forgot-password', function () {
    return view('ForgotPassword');
})->name('admin.forgotPassword');

Route::get('/404', function () {
    return view('404');
})->name('admin.404');

Route::get('/500', function () {
    return view('500');
})->name('admin.500');



