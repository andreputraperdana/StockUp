<?php

namespace App\Http\Controllers;

use App\Models\TransaksiBarangMasuk;

class ListBarangController extends Controller
{
    public function getindex($id){
        $hasil = TransaksiBarangMasuk::where('barang_umkm_id', '=', $id)->get();
        return view('listbarang',  ['hasil'=> $hasil]);
    }
}