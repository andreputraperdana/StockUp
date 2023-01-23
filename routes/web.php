<?php

use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\DetailNotifikasiController;
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
use App\Models\Role;
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

Route::get('/barang/fetch_data', [BerandaController::class, 'fetchDataBarang']);

Route::get('/listalluser', [ListUserController::class, 'getindex']);

Route::POST('/chat', [ChatController::class, 'getindex']);

Route::get('/tambahbarang', [TambahBarangController::class, 'getindex']);

Route::post('/tambahbarang', [TambahBarangController::class, 'inputbarang'])->name('tambahbarang');

Route::get('/laporan', [LaporanController::class, 'getindex']);

Route::post('/laporanbarang',[LaporanController::class, 'getdatalaporan']);

Route::get('/mengelolabarang', [MengelolaBarangController::class, 'getindex']);

Route::get('/toko', [TokoController::class, 'getindex']);

Route::get('/editprofile', [EditProfileController::class, 'getindex']);

Route::get('/editbarang/{id}', [EditBarangController::class, 'getindex']);

// Route::get('/notifikasifilter/{id}', [NotifikasiController::class, 'filternotif']);

// Route::get('/notifikasi/{id}', [NotifikasiController::class, 'filternotif']);

Route::get('/notifikasi/fetch_data', [NotifikasiController::class, 'fetch_data']);

Route::get('/notifikasi', [NotifikasiController::class, 'getindex']);

Route::get('/item/{id}', [ItemController::class, 'getindex']);

Route::get('/profiltoko/{id}', [ProfilTokoController::class, 'getindex']);

Route::get('/platformsosial/{id}', [PlatformSosialController::class, 'getindex']);

Route::get('/ajaxData', [MengelolaBarangController::class, 'ajaxData']);

Route::get('/listbarang/{id}', [ListBarangController::class, 'getindex']);

Route::delete('/listbarangs/{id}', [ListBarangController::class, 'destroy'])->name('barang.destroy');

Route::delete('/mengelolabarang/{id}', [MengelolaBarangController::class, 'destroy'])->name('users.destroy');

// Route::get('/notif', [SendNotificationController::class, 'getindex']);

Route::post('/detailnotif', [NotifikasiController::class, 'postdetail']);

Route::post('/editbarang/update', [EditBarangController::class, 'update']);

Route::get('/detailbarang/{id}', [DetailBarangController::class, 'getindex'])->name('detailsbarang');

Route::post('/barangkeluar', [MengelolaBarangController::class, 'GetBarangKeluar']);

Route::get('/detailnotifikasi/{id}', [DetailNotifikasiController::class, 'getindex']);

Route::post('/editprofile/update', [EditProfileController::class, 'update']);

Route::get('/barcode/{id}/{kodeId}', [BarcodeController::class, 'getindex'])->name('barcode');

Route::get('/toko/{jenis}', [TokoController::class, 'getDataByKategori']);

// Route::get('/laporan/cetak_pdf/{jenis}/{start}/{end}', [LaporanController::class, 'cetak_pdf']);

Route::get('/laporan/cetak_pdf', [LaporanController::class, 'cetak_pdf']);
