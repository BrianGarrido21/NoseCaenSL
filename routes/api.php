<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\FeeController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\API\UserController;
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

Route::prefix('/v1')->group(function () {
    Route::apiResource('/employee', EmployeeController::class);
    Route::apiResource('/task', TaskController::class);
    Route::apiResource('/fee', FeeController::class);
    Route::apiResource('/user', UserController::class);
});
