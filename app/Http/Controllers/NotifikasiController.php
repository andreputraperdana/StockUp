<?php

namespace App\Http\Controllers;

use App\Models\TransaksiBarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class NotifikasiController extends Controller
{
    public function getindex(){
        $BarangHabis = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10");
        $AllBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id','transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->union($BarangHabis)->paginate(3);
        // dd($AllBarang);
        $countAllBarang = Count($AllBarang);
        return view('notifikasi', ['Allbarang'=> $AllBarang, 'countAllBarang' => $countAllBarang]);
    }

    public function postdetail(Request $request){
        $hasil = $request->input();
        if($hasil['tipe_notif'] == 'BarangKadaluarsa'){
            $idbarang = $hasil['id_barang'];
            $searchbarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->where('transaksi_barang_masuk.id', '=', $idbarang)->select('barang_umkm.nama', 'jenis','transaksi_barang_masuk.*')->first();
            $searchbarang->notif_flag = 1;
            $searchbarang->save();
            return response()->json(['stats'=>200, 'detailbarang'=> $searchbarang]);
        }
        else if($hasil['tipe_notif'] == 'BarangHabis'){
            $idbarangUMKM = $hasil['id_barang'];
            $searchbarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->where('transaksi_barang_masuk.barang_umkm_id', '=', $idbarangUMKM)->select('barang_umkm.nama', 'jenis','transaksi_barang_masuk.*')->get();
            $searchbarangnotif = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->where('transaksi_barang_masuk.barang_umkm_id', '=', $idbarangUMKM)->select('barang_umkm.nama', 'jenis','transaksi_barang_masuk.*')->first();
            $searchbarangnotif->notif_flag = 1;
            $searchbarangnotif->save();
            return response()->json(['stats'=>300, 'detailbarang'=> $searchbarang]);
        }


        
    }
}
