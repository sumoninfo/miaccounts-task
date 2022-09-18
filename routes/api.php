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
Route::get('/report1', [\App\Http\Controllers\ReportController::class, 'report1']);
Route::get('/report2', [\App\Http\Controllers\ReportController::class, 'report2']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
