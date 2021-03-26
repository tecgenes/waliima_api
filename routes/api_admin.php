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
Route::group(['namespace' => 'AdminApi', 'prefix' => 'admin'], function () {
    Route::post('login', 'AdminAuthController@login');
    
});

Route::group(['middleware' => ['api', 'checkAdminToken:admin-api'], 'namespace' => 'AdminApi', 'prefix' => 'admin'], function () {
    Route::post('me', 'AdminAuthController@me');
    Route::post('refresh', 'AdminAuthController@refresh');
    Route::post('logout', 'AdminAuthController@logout');
});


