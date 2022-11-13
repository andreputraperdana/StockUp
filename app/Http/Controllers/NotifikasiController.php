<?php

namespace App\Http\Controllers;

use App\Models\TransaksiBarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotifikasiController extends Controller
{
    public function getindex(){
        $AllBarang = TransaksiBarangMasuk::select('*', DB::raw('CURDATE() as Date_Today'))->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa)) OR jumlah < 5'))->paginate(3);
        return view('notifikasi', ['Allbarang'=> $AllBarang]);
    }

    public function postdetail(Request $request){
        $hasil = $request->input();
        $idbarang = $hasil['id_barang'];
        $searchbarang = TransaksiBarangMasuk::where('id', '=', $idbarang)->first();
        $searchbarang->notif_flag = 1;
        $searchbarang->save();
        
        return response()->json(['stats'=>300, 'errors'=>'Test']);
    }
}
