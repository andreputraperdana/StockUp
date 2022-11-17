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
        $AllItems = TransaksiBarangMasuk::groupBy('barang_umkm_id')->select('barang_umkm_id',DB::raw('SUM(jumlah) as total'))->get();
        if(request('search')){
            $cari = request('search');
            $AllItems = DB::table('barang_umkm')->where('nama','like',"%".$cari."%")->get();
        }
        // $Size = count($AllItems);
        
        return view('mengelolabarang', ['flag'=>$flag, 'AllItems'=>$AllItems]);
    }

    public function destroy($id){
        DB::delete('DELETE FROM barang_umkm WHERE id = ?', [$id]);
        return redirect('mengelolabarang')->with('success','Barang Telah Di hapus');
    }

    public function ajaxData(){
        $BarangMasuk = DB::select('select * from transaksi_barang_masuk where barang_umkm_id = 1');
        return response()->json(['BarangMasuk'=>$BarangMasuk]);
    }
}