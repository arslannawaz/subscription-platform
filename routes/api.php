<?php

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

Route::group(['prefix' => 'posts'], function () {
    Route::post('/create', [App\Http\Controllers\API\PostController::class, 'create'])->name('posts.create');
});

Route::group(['prefix' => 'user-subscribe'], function () {
    Route::post('/create', [App\Http\Controllers\API\UserSubscribeController::class, 'create'])->name('user-subscribe.create');
});
