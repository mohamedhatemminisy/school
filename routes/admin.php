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
    Route::group([ 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
        Route::get('/','App\Http\Controllers\Dashboard\DashboardController@index')->name('admin.dashboard');
        Route::get('/Orders','App\Http\Controllers\Dashboard\OrderController@index')->name('admin.Orders');
        Route::get('/order_filter','App\Http\Controllers\Dashboard\OrderController@index')->name('order.filter');

    });

    Route::group(['prefix' => 'admin/login'], function () {
        Route::get('/', 'App\Http\Controllers\Dashboard\LoginController@login')
        ->name('admin.login');
        Route::get('logout', 'App\Http\Controllers\Dashboard\LoginController@logout')->name('admin.logout');
        Route::post('/', 'App\Http\Controllers\Dashboard\LoginController@postLogin')
        ->name('admin.post.login');
    });