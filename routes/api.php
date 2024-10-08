<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Post\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->middleware('api')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['namespace' => 'App\Http\Controllers\Post', 'middleware' => 'jwt.auth'], function () {
    Route::get('/posts', 'IndexController');
    Route::get('/posts/create', 'CreateController');

    Route::post('/posts', 'StoreController');
    Route::get('/posts/{post}', 'ShowController');
    Route::get('/posts/{post}/edit', 'EditController');
    Route::patch('/posts/{post}', 'UpdateController');
    Route::delete('/posts/{post}', 'DestroyController');
});


