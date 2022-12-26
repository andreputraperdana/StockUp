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

        // $TransaksiBarang = DB::select("SELECT final.id as id , final.nama, SUM(final.StockAwalAkhir) as Stockfinalawal FROM (SELECT bum.id, bum.nama, transaksimasuk.stockawal, transaksikeluar.TotalBarangKeluar, (CASE WHEN transaksimasuk.stockawal IS NULL THEN 0 ELSE transaksimasuk.stockawal END - CASE WHEN transaksikeluar.TotalBarangKeluar IS NULL THEN 0 ELSE transaksikeluar.TotalBarangKeluar END) as StockAwalAkhir  FROM barang_umkm bum LEFT JOIN (SELECT id, barang_umkm_id, stockawal FROM transaksi_barang_masuk WHERE DATE_FORMAT(CREATED_AT, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan ."', '%Y-%m-%d')) transaksimasuk on bum.id = transaksimasuk.barang_umkm_id
        // LEFT JOIN(SELECT transaksi_barang_masuk_id, SUM(jumlah) as TotalBarangKeluar FROM transaksi_barang_keluar WHERE DATE_FORMAT(CREATED_AT, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') GROUP BY transaksi_barang_masuk_id) transaksikeluar on transaksimasuk.id = transaksikeluar.transaksi_barang_masuk_id) final GROUP BY final.id, final.nama
        // ");
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

        // SELECT bumkm.id, bumkm.nama, abc.Stockfinaly, d.stockawal as barangmasuk, d.created_at as tanggalmasukbarang, e.jumlah as barangkeluar, e.created_at as tanggalkeluarbarang FROM BARANG_UMKM bumkm JOIN (
        //     SELECT final.id as id, final.nama, SUM(final.StockAwalAkhir) as Stockfinaly FROM (
        //     SELECT a.id, a.nama, b.stockawal, c.TotalBarangKeluar, ( b.stockawal -  c.TotalBarangKeluar) as StockAwalAkhir FROM BARANG_UMKM a LEFT JOIN (SELECT id, barang_umkm_id, stockawal
        //     FROM TRANSAKSI_BARANG_MASUK WHERE created_at < '2022-12-21') b on a.id = b.barang_umkm_id 
        //     LEFT JOIN(SELECT transaksi_barang_masuk_id, SUM(jumlah) as TotalBarangKeluar FROM TRANSAKSI_BARANG_KELUAR WHERE created_at < '2022-12-21' GROUP BY transaksi_barang_masuk_id) c on b.id = c.transaksi_barang_masuk_id ) final GROUP BY final.id, final.nama) abc on bumkm.id = abc.id LEFT JOIN(SELECT * FROM TRANSAKSI_BARANG_MASUK tbm WHERE tbm.created_at BETWEEN '2022-12-21' AND '2022-12-24') d on bumkm.id = d.barang_umkm_id
        //     LEFT JOIN(SELECT * FROM TRANSAKSI_BARANG_KELUAR tbl WHERE tbl.created_at BETWEEN '2022-12-21' AND '2022-12-24')e on d.id = e.transaksi_barang_masuk_id and d.created_at = e.created_at
        //     UNION
        //     SELECT x.id, x.nama, NULL as Stockfinaly, NULL as barangmasuk, z.created_at as tanggalmasukbarang, z.jumlah as barangkeluar, z.created_at as tanggalkeluarbarang FROM BARANG_UMKM x LEFT JOIN(SELECT * FROM TRANSAKSI_BARANG_MASUK tbm WHERE tbm.created_at BETWEEN '2022-12-21' AND '2022-12-24') y on x.id = y.barang_umkm_id
        //     LEFT JOIN(SELECT * FROM TRANSAKSI_BARANG_KELUAR tbl WHERE tbl.created_at BETWEEN '2022-12-21' AND '2022-12-24')z on y.id = z.transaksi_barang_masuk_id where y.created_at != z.created_at ORDER BY id, tanggalmasukbarang


        if($inputlaporan['jenislaporan'] == "Keluar masuk barang"){
            
            $LaporanBarangKeluarDifTanggal = BarangUMKM::leftJoin(DB::raw("(SELECT * FROM transaksi_barang_masuk WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d')) TransBarangMasuk"), function($join3){
                $join3->on('barang_umkm.id', '=', 'TransBarangMasuk.barang_umkm_id');
            })->leftJoin(DB::raw("(SELECT * FROM transaksi_barang_keluar WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d')) TransBarangKeluar"), function($join4){
                $join4->on('TransBarangMasuk.id', '=', 'TransBarangKeluar.transaksi_barang_masuk_id');
            })->where(DB::raw("DATE_FORMAT(TransBarangMasuk.created_at, '%Y-%m-%d')"), "!=", DB::raw("DATE_FORMAT(TransBarangKeluar.created_at, '%Y-%m-%d')"))->select('barang_umkm.id', DB::raw("TransBarangMasuk.id as barangmasukid, NULL as nama, NULL as Stockfinalawal, NULL as barangmasuk, DATE_FORMAT(TransBarangKeluar.created_at, '%Y-%m-%d') as tanggalmasukbarang, TransBarangKeluar.jumlah as barangkeluar, DATE_FORMAT(TransBarangKeluar.created_at,'%Y-%m-%d') as tanggalkeluarbarang"));
        
            $LaporanBarang = BarangUMKM::join(DB::raw("(SELECT final.id as id , final.nama, SUM(final.StockAwalAkhir) as Stockfinalawal FROM (SELECT bum.id, bum.nama, transaksimasuk.stockawal, transaksikeluar.TotalBarangKeluar, (CASE WHEN transaksimasuk.stockawal IS NULL THEN 0 ELSE transaksimasuk.stockawal END - CASE WHEN transaksikeluar.TotalBarangKeluar IS NULL THEN 0 ELSE transaksikeluar.TotalBarangKeluar END) as StockAwalAkhir  FROM barang_umkm bum LEFT JOIN (SELECT id, barang_umkm_id, stockawal FROM transaksi_barang_masuk WHERE DATE_FORMAT(CREATED_AT, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan ."', '%Y-%m-%d')) transaksimasuk on bum.id = transaksimasuk.barang_umkm_id
            LEFT JOIN(SELECT transaksi_barang_masuk_id, SUM(jumlah) as TotalBarangKeluar FROM transaksi_barang_keluar WHERE DATE_FORMAT(CREATED_AT, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') GROUP BY transaksi_barang_masuk_id) transaksikeluar on transaksimasuk.id = transaksikeluar.transaksi_barang_masuk_id) final GROUP BY final.id, final.nama) combinestock
            "), function($join){
                $join->on('barang_umkm.id', '=', 'combinestock.id');
            })->leftJoin(DB::raw("(SELECT * FROM transaksi_barang_masuk WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d')) TransaksiBarangMasuk"), function($join1){
                $join1->on('barang_umkm.id', '=', 'TransaksiBarangMasuk.barang_umkm_id');
            })->leftJoin(DB::raw("(SELECT * FROM transaksi_barang_keluar WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d')) TransaksiBarangKeluar"), function($join2){
                $join2->on('TransaksiBarangMasuk.id', '=', 'TransaksiBarangKeluar.transaksi_barang_masuk_id');
                $join2->on(DB::raw("DATE_FORMAT(TransaksiBarangMasuk.created_at, '%Y-%m-%d')"), "=", DB::raw("DATE_FORMAT(TransaksiBarangKeluar.created_at, '%Y-%m-%d')"));
            })->select('barang_umkm.id', DB::raw('TransaksiBarangMasuk.id as barangmasukid'), 'barang_umkm.nama', 'combinestock.Stockfinalawal', DB::raw("TransaksiBarangMasuk.stockawal as barangmasuk, DATE_FORMAT(TransaksiBarangMasuk.created_at, '%Y-%m-%d') as tanggalmasukbarang, TransaksiBarangKeluar.jumlah as barangkeluar, DATE_FORMAT(TransaksiBarangKeluar.created_at, '%Y-%m-%d') as tanggalkeluarbarang"))->union($LaporanBarangKeluarDifTanggal)->orderBy('id', 'ASC')->orderBy('tanggalmasukbarang', 'ASC')->get();
        
            return response()->json(['stats'=>100, 'laporanbarang'=> $LaporanBarang , 'jenislaporan'=> $inputlaporan['jenislaporan'] , 'periodeawal'=>$tanggalawalLaporan, 'periodeakhir'=>$tanggalakhirLaporan]);
        }
        else if($inputlaporan['jenislaporan'] == "Persediaan stok barang"){

        }
        else if($inputlaporan['jenislaporan'] == "Barang akan kadaluarsa"){
            $BarangAkanKadalurasa = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('*', DB::raw('CURDATE() as Date_Today'))->whereRaw(DB::raw("((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa)) AND (DATE_FORMAT(transaksi_barang_masuk.created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('". $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d'))"))->where('user_id', '=', auth()->user()->id)->select('transaksi_barang_masuk.id', 'transaksi_barang_masuk.barang_umkm_id','barang_umkm.nama', 'harga', 'jumlah', 'tanggal_kadaluarsa', DB::raw("DATE_FORMAT(transaksi_barang_masuk.created_at, '%Y-%m-%d') as TanggalMasukBarang"))->get();
            return response()->json(['stats'=>300, 'laporanbarang'=> $BarangAkanKadalurasa , 'jenislaporan'=> $inputlaporan['jenislaporan'] , 'periodeawal'=>$tanggalawalLaporan, 'periodeakhir'=>$tanggalakhirLaporan]);
        }
        else if($inputlaporan['jenislaporan'] == "Barang akan habis"){  
            $BarangAkanHabis = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id','barang_umkm.id', 'barang_umkm.nama')->having(DB::raw('SUM(jumlah)'), '<', 10)->select('barang_umkm_id', 'barang_umkm.id', 'barang_umkm.nama',DB::raw('SUM(jumlah) as total'))->whereRaw(DB::raw("(DATE_FORMAT(transaksi_barang_masuk.created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('". $tanggalawalLaporan ."','%Y-%m-%d') AND DATE_FORMAT('".$tanggalakhirLaporan."','%Y-%m-%d'))"))->where('user_id', '=', auth()->user()->id)->get();
            return response()->json(['stats'=>400, 'laporanbarang'=> $BarangAkanHabis, 'jenislaporan'=> $inputlaporan['jenislaporan'], 'periodeawal'=>$tanggalawalLaporan, 'periodeakhir'=>$tanggalakhirLaporan]);

        }
    }
}