<?php

namespace App\Http\Controllers;

use App\Models\TransaksiBarangMasuk;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function getindex($id, Request $request){
        $Barang = TransaksiBarangMasuk::where('id', '=', $id)->first();
        $BarangKadaluarsa = str_replace("-", "", $Barang->tanggal_kadaluarsa);
        $idBrg = $Barang->barang_umkm_id;
        $count = 0;
        $count+=1;
        $no = "00" . $count;
        $idBarang = $idBrg . $no;
        $KodeBarang = $idBarang . $BarangKadaluarsa;
        return view('barcode', ['KodeBarang' => $KodeBarang]);
    }
}
