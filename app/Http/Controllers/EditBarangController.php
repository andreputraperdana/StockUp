<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Support\Facades\DB;

class EditBarangController extends Controller
{
    public function getindex($id){
        $hasil = DB::table('barang_umkm')
        ->join('transaksi_barang_masuk', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')
        ->where('transaksi_barang_masuk.id', '=', $id)->get();
        return view('editbarang', ['hasil'=>$hasil]);
    }
}
