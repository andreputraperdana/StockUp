<?php

namespace App\Http\Controllers;

use App\Models\BarangUMKM;
use App\Models\TransaksiBarangKeluar;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function getindex(){
        $flag = 3;
        return view('laporan', ['flag'=>$flag]);
    }

    public function getdatalaporan(Request $request){
        $inputlaporan = $request->all();
        $tanggalawalLaporan = $inputlaporan['input_tanggalawal'];
        $tanggalakhirLaporan = $inputlaporan['input_tanggalakhir'];

        $TransaksiBarang = DB::select("SELECT * FROM barang_umkm bum LEFT JOIN (SELECT * FROM transaksi_barang_masuk tbm1 WHERE DATE_FORMAT(tbm1.CREATED_AT, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan ."', '%Y-%m-%d')) transaksimasuk on bum.id = transaksimasuk.barang_umkm_id");
        $TransaksiBarangKeluar = DB::select("SELECT * FROM transaksi_barang_keluar WHERE DATE_FORMAT(CREATED_AT, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') ");
        
        dd($TransaksiBarangKeluar);
        // dd($inputlaporan['input_tanggalawal']);
        // $TotalStockBarangMasuk = TransaksiBarangMasuk::leftJoin(DB::raw("(SELECT barang_umkm_id, SUM(jumlah) as TotalBarangKeluar FROM transaksi_barang_keluar WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d') GROUP BY barang_umkm_id) BarangKeluar"), function($join){
        //     $join->on('transaksi_barang_masuk.barang_umkm_id', '=', 'BarangKeluar.barang_umkm_id');
        // })->whereRaw(DB::raw("(DATE_FORMAT(transaksi_barang_masuk.created_at, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan . "', '%Y-%m-%d'))"))->select("transaksi_barang_masuk.barang_umkm_id", "BarangKeluar.TotalBarangKeluar" ,DB::raw("SUM(transaksi_barang_masuk.jumlah) as StockAwal"))->groupBy("barang_umkm_id", "BarangKeluar.TotalBarangKeluar")->get();
        // dd($TotalStockBarangMasuk);

        // $TotalStockBarang = TransaksiBarangMasuk::leftJoin(DB::raw("(SELECT barang_umkm_id, SUM(jumlah) as TotalBarang FROM transaksi_barang_masuk WHERE DATE_FORMAT(created_at, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan ."','%Y-%m-%d') GROUP BY barang_umkm_id) BarangMasuk"), function($join){
        //     $join->on('transaksi_barang_masuk.barang_umkm_id', '=', 'BarangMasuk.barang_umkm_id');
        // })->join(DB::raw("(SElECT id, nama FROM barang_umkm) barangumkm"), function($joins){
        //     $joins->on('transaksi_barang_masuk.barang_umkm_id', '=','barangumkm.id');
        // })->leftJoin(DB::raw("(SELECT barang_umkm_id, SUM(jumlah) as TotalBarangKeluar FROM transaksi_barang_keluar WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d') GROUP BY barang_umkm_id) BarangKeluar"), function($join1){
        //     $join1->on('transaksi_barang_masuk.barang_umkm_id', '=', 'BarangKeluar.barang_umkm_id');
        // })->whereRaw(DB::raw("DATE_FORMAT(transaksi_barang_masuk.created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan . "', '%Y-%m-%d') AND DATE_FORMAT('". $tanggalakhirLaporan ."','%Y-%m-%d')"))->select("transaksi_barang_masuk.barang_umkm_id", "transaksi_barang_masuk.jumlah", "transaksi_barang_masuk.created_at", "barangumkm.nama", "BarangKeluar.TotalBarangKeluar","BarangMasuk.TotalBarang")->get();
        // dd($TotalStockBarang);

        // $AllStockBarang = BarangUMKM::leftJoin(DB::raw("(SELECT barang_umkm_id, SUM(jumlah) as TotalBarang FROM transaksi_barang_masuk WHERE DATE_FORMAT(created_at, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan ."','%Y-%m-%d') GROUP BY barang_umkm_id) StockBarang"), function($join){
        //     $join->on('barang_umkm.id', '=', 'StockBarang.barang_umkm_id');
        // })->leftJoin(DB::raw("(SELECT barang_umkm_id, SUM(jumlah) as TotalBarangMasuk FROM transaksi_barang_masuk WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d') GROUP BY barang_umkm_id) BarangMasuk"), function($join1){
        //     $join1->on('barang_umkm.id', '=', 'BarangMasuk.barang_umkm_id');
        // })->leftJoin(DB::raw("(SELECT barang_umkm_id, SUM(jumlah) as TotalBarangKeluar FROM transaksi_barang_keluar WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d') GROUP BY barang_umkm_id) BarangKeluar"), function($join2){
        //     $join2->on('barang_umkm.id', '=', 'BarangKeluar.barang_umkm_id');
        // })->select("barang_umkm.id", "barang_umkm.nama", "StockBarang.TotalBarang", "BarangMasuk.TotalBarangMasuk", "BarangKeluar.TotalBarangKeluar")->get();

        // dd($AllStockBarang);

        // $AllBarang =DB::select("SELECT barang_umkm_id, jumlah, created_at FROM transaksi_barang_masuk WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') AND DATE_FORMAT('". $tanggalakhirLaporan ."','%Y-%m-%d')) BarangMasuk");
        // dd($TotalStockBarangMasuk);
        // dd($AllBarang);
        // $AllBarangUMKM = TransaksiBarangMasuk::whereRaw(DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan . "', '%Y-%m-%d'))"))->select("barang_umkm_id", "jumlah")->get();
        // dd($AllBarangUMKM);

        // $testing = DB::SELECT("SELECT barang_umkm_id, SUM(jumlah) as StockKeluar FROM transaksi_barang_keluar where (DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('". $tanggalawalLaporan . "', '%Y-%m-%d') AND DATE_FORMAT('". $tanggalakhirLaporan ."', '%Y-%m-%d')) GROUP BY barang_umkm_id");
        // dd($TotalStockBarangMasuk);
        // $TotalStockBarangKeluar = TransaksiBarangKeluar::whereRaw(DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('". $tanggalawalLaporan . "', '%Y-%m-%d') AND DATE_FORMAT('". $tanggalakhirLaporan ."', '%Y-%m-%d'))"))->Select("barang_umkm_id", DB::raw("SUM(jumlah) as StockKeluar"))->groupBy("barang_umkm_id")->get();
        // dd($Allbarang->All());
        // dd($TotalStockBarangKeluar);


        if($inputlaporan['jenislaporan'] == "Keluar masuk barang"){

        }
        else if($inputlaporan['jenislaporan'] == "Persediaan stok barang"){

        }
        else if($inputlaporan['jenislaporan'] == "Barang akan kadaluarsa"){
            $BarangAkanKadalurasa = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('*', DB::raw('CURDATE() as Date_Today'))->whereRaw(DB::raw("((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa)) AND (DATE_FORMAT(transaksi_barang_masuk.created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('". $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d'))"))->where('user_id', '=', auth()->user()->id)->select('transaksi_barang_masuk.id', 'transaksi_barang_masuk.barang_umkm_id','barang_umkm.nama', 'harga', 'jumlah', 'tanggal_kadaluarsa', DB::raw("DATE_FORMAT(transaksi_barang_masuk.created_at, '%Y-%m-%d') as TanggalMasukBarang"))->get();
            return response()->json(['stats'=>300, 'laporanbarang'=> $BarangAkanKadalurasa , 'jenislaporan'=> $inputlaporan['jenislaporan'] , 'periodeawal'=>$tanggalawalLaporan, 'periodeakhir'=>$tanggalakhirLaporan]);
        }
        else if($inputlaporan['jenislaporan'] == "Barang akan habis"){  
            $BarangAkanHabis = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id','barang_umkm.id', 'barang_umkm.nama')->having(DB::raw('SUM(jumlah)'), '<', 5)->select('barang_umkm_id', 'barang_umkm.id', 'barang_umkm.nama',DB::raw('SUM(jumlah) as total'))->whereRaw(DB::raw("(DATE_FORMAT(transaksi_barang_masuk.created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('". $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d'))"))->where('user_id', '=', auth()->user()->id)->get();
            return response()->json(['stats'=>400, 'laporanbarang'=> $BarangAkanHabis, 'jenislaporan'=> $inputlaporan['jenislaporan'], 'periodeawal'=>$tanggalawalLaporan, 'periodeakhir'=>$tanggalakhirLaporan]);

        }
    }
}