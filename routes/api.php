<?php

use App\Http\Controllers\API\BooksController;
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

Route::group(['prefix' => 'books'], function () {

    Route::get('/', [BooksController::class, 'index']);
    Route::post('/', [BooksController::class, 'store']);
    Route::get('/{book}', [BooksController::class, 'show']);
    Route::match(['put', 'patch'], '/{book}', [BooksController::class, 'update']);
    Route::delete('/{book}', [BooksController::class, 'delete']);
});
