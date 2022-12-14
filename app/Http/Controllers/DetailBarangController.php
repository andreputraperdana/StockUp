<?php

namespace App\Http\Controllers;

use App\Models\BarangUMKM;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Http\Request;

class DetailBarangController extends Controller
{
    public function getindex($id){

        $DetailBarang = BarangUMKM::join('transaksi_barang_masuk', 'transaksi_barang_masuk.barang_umkm_id', '=' , 'barang_umkm.id')->where('barang_umkm_id', '=', $id)->get();
        return view('detailbarang',['DetailBarang'=>$DetailBarang]);
        // return redirect()->intended('/detailbarang', ['id',(int)$id]);
    }
}
