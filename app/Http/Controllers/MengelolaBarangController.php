<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangUMKM;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Isset_;

class MengelolaBarangController extends Controller
{
    public function getindex(){
        $flag = 4;
        $AllItems = DB::select('select * from barang_umkm');
        $Size = count($AllItems);
        
        return view('mengelolabarang', ['flag'=>$flag, 'Size'=>$Size, 'AllItems'=>$AllItems]);
    }

    public function cari(Request $request){
        $cari = $request->cari;
        dd($cari);
        $AllItems = DB::table('barang_umkm')
		->where('nama','like',"%".$cari."%");
        return view('mengelolabarang',['AllItems'=>$AllItems]);
    }

    public function ajaxData(){
        $BarangMasuk = DB::select('select * from transaksi_barang_masuk where barang_umkm_id = 1');
        return response()->json(['BarangMasuk'=>$BarangMasuk]);
    }
}