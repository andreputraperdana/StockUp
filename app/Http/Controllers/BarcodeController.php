<?php

namespace App\Http\Controllers;

use App\Models\TransaksiBarangMasuk;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function getindex($id, Request $request, $kodeId){
        $Barang = TransaksiBarangMasuk::where('id', '=', $id)->first();
        $BarangKadaluarsa = str_replace("-", "", $Barang->tanggal_kadaluarsa);
        $kode = str_replace("-","", $kodeId);
        $kodeBrang = str_replace(" ", "", $kode);
        $KodeBarang = $kodeBrang . $BarangKadaluarsa;
        return view('barcode', ['KodeBarang' => $KodeBarang]);
    }
}
