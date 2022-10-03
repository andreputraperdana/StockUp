<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\HalamanUtamaController;
use App\Http\Controllers\ListUserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HalamanUtamaController::class, 'getindex']);

Route::get('/daftar', [DaftarController::class, 'getindex']);

Route::post('/daftar', [DaftarController::class, 'inputdata']);

Route::get('/login', [LoginController::class, 'getindex']);

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'Logout']);

Route::get('/beranda', [BerandaController::class, 'getindex']);

Route::get('/listalluser', [ListUserController::class, 'getindex']);

Route::get('/chat', function(){
    return view('chat');
});


Route::get('/tambahbarang', function(){
    return view('tambahbarang');
});

Route::get('/editprofile', function(){
    return view('editprofile');
});

Route::get('/editprofile', function(){
    return view('editprofile');
});

Route::get('/editbarang', function(){
    return view('editbarang');
});

Route::get('/notifikasi', function(){
    return view('notifikasi');
});

Route::get('/toko', function(){
    return view('toko');
});

Route::get('/item', function(){
    return view('item');
});

Route::get('/mengelolabarang', function(){
    return view('mengelolabarang');
});

Route::get('/profiltoko', function(){
    return view('profiltoko');
});

Route::get('/platformsosial', function(){
    return view('platformsosial');
});

Route::get('/laporan', function(){
    return view('laporan');
});