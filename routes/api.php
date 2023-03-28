<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\EmployerController;
use \App\Http\Controllers\EmploymentController;
use \App\Http\Controllers\CityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('employee', EmployeeController::class);
Route::resource('employer', EmployerController::class);
Route::resource('employment', EmploymentController::class);
Route::resource('city', CityController::class);
