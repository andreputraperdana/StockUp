<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangUMKM;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Support\Facades\DB;

class MengelolaBarangController extends Controller
{
    public function getindex(){
        $flag = 4;
        // $AllItems = BarangUMKM::where('user_id', '=', auth()->user()->id)->get();
        $AllItems = DB::select('select * from barang_umkm');
        $BarangMasuk = DB::select('select * from transaksi_barang_masuk');
        $Size = count($AllItems);
        
        
        return view('mengelolabarang', ['flag'=>$flag, 'AllItems'=>$AllItems, 'BarangMasuk'=>$BarangMasuk, 'Size'=>$Size]);
    }

    public function ajaxData(){
        $BarangMasuk = DB::select('select * from barang_umkm');
        return response()->json(['BarangMasuk'=>$BarangMasuk]);
    }
}