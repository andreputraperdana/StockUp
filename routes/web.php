<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\EditBarangController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\HalamanUtamaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ListUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TambahBarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\MengelolaBarangController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PlatformSosialController;
use App\Http\Controllers\ProfilTokoController;
use App\Http\Controllers\TokoController;
use App\Models\PlatformSosial;
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

Route::get('/chat', [ChatController::class, 'getindex']);

Route::get('/tambahbarang', [TambahBarangController::class, 'getindex']);

Route::post('/tambahbarang', [TambahBarangController::class, 'inputbarang']);

Route::get('/laporan', [LaporanController::class, 'getindex']);

Route::get('/mengelolabarang', [MengelolaBarangController::class, 'getindex']);

Route::get('/toko', [TokoController::class, 'getindex']);

Route::get('/editprofile', [EditProfileController::class, 'getindex']);

Route::get('/editbarang', [EditBarangController::class, 'getindex']);

Route::get('/notifikasi', [NotifikasiController::class, 'getindex']);

Route::get('/item', [ItemController::class, 'getindex']);

Route::get('/profiltoko', [ProfilTokoController::class, 'getindex']);

Route::get('/platformsosial',[PlatformSosialController::class, 'getindex']);

Route::get('/ajaxData',[MengelolaBarangController::class, 'ajaxData']);

Route::get('/listbarang/{id}', [ListBarangController::class, 'getindex']);

Route::get('/mengelolabarang/cari',[MengelolaBarangController::class, 'cari']);
