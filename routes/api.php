<?php

use App\Http\Controllers\UserController;
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

//ambil semua data user
// Route::get('users', 'UserController@index');
Route::get('/users', [UserController::class, 'index']);
//membuat user baru
// Route::post('user', 'UserController@store');
Route::post('/user', [UserController::class, 'store']);

//mengambil satu user
// Route::get('user/{id}', 'UserController@show');
Route::get('/user/{id}', [UserController::class, 'show']);

//mengubah user
// Route::put('user/{id}', 'UserController@update');
Route::put('/user/{id}', [UserController::class, 'update']);

//menghapus user
// Route::delete('user/{id}', 'UserController@destroy');
Route::delete('/user/{id}', [UserController::class, 'destroy']);
