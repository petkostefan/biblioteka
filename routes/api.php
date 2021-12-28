<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserBooksController;
use App\Http\Controllers\UserController;

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

Route::get('/available-books', [UserBooksController::class, 'availableBooks']);
Route::get('/user-books/{user_id}', [UserBooksController::class, 'userBooks']);
Route::post('/add-book', [BookController::class, 'store']);
Route::delete('/delete-book/{book_id}', [BookController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/rent-book', [UserBooksController::class, 'rentBook']);
    Route::post('/return-book', [UserBooksController::class, 'returnBook']);

    Route::post('/logout', [AuthController::class, 'logout']);
});


