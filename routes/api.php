<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\OrderController;
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

Route::post('login', [PassportAuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    // get logged in user tests
    Route::get('studentTests', [StudentController::class, 'studentTests']);
    // get all students tests
    Route::get('studentsTests', [StudentController::class, 'studentsTests']);
    // get order school for defined test
    Route::get('orderSchoolsTest', [TestController::class, 'orderSchoolsTest']);
    // finish order , fire event then send confirmation mail to admin in mailtrap
    Route::get('finishOrder', [OrderController::class, 'finishOrder']);
});