<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DetailController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    // Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    // Route::get('/dash', [DashboardController::class, 'index']);
    // Route::resource('/users', UserController::class);
    Route::resource('/detail', DetailController::class);
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);