<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OwnedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishController;
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
Route::post('login', [UserController::class, 'store'])->name('login');

Route::get('ziggy', fn() => response()->json(new \Tightenco\Ziggy\Ziggy()));

Route::middleware('auth:sanctum')->group(function () {
    Route::get('login/checker', [UserController::class, 'loginChecker'])->name('login.checker');
    Route::post('logout', [UserController::class, 'destroy'])->name('logout');

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('books', BookController::class);
});
