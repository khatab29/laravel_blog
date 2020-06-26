<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Posts as PostsResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::POST('login', 'Api\auth\loginController@login');
Route::get('profile', 'Api\auth\loginController@profile');
Route::POST('logout', 'Api\auth\loginController@logout');

Route::group(['prefix'=>'posts'],function (){
    Route::get('/', 'Api\PostController@index');
    Route::POST('/store', 'Api\PostController@store');
    Route::get('/{post}', 'Api\PostController@show');
    Route::get('/{post}/edit', 'Api\PostController@edit');
    Route::PUT('/{post}/update', 'Api\PostController@update');
    Route::delete('/{post}/delete', 'Api\PostController@destroy');



    });
