<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

//Routes category
Route::apiResource('category','\App\Http\Controllers\CategoryController');

Route::apiResource('postresource','\App\Http\Controllers\ControllerPost');
Route::get('post/{id}','\App\Http\Controllers\PostController@individual');
Route::get('post','\App\Http\Controllers\PostController@index');
Route::get('pdededeost','\App\Http\Controllers\PostController@index');

//rutas para los en point



Route::get('PostCategory', '\App\Http\Controllers\PostController@PostCategory');

Route::get('categories', '\App\Http\Controllers\PostController@categories');

Route::get('unaCategoria/{id}','\App\Http\Controllers\PostController@unaCategoria');

Route::get('cuerpoPost/{id}','\App\Http\Controllers\PostController@cuerpoPost');

Route::get('endpoint','\App\Http\Controllers\PostController@endpoint');

