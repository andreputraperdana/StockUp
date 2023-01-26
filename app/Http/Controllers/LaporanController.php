<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use App\Models\BarangUMKM;
use App\Models\TransaksiBarangKeluar;
use App\Models\TransaksiBarangMasuk;
// use Barryvdh\DomPDF\Facades\Pdf as FacadesPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LaporanController extends Controller
{
    public function getindex()
    {
        $flag = 3;
        return view('laporan', ['flag' => $flag]);
    }

    public function getdatalaporan(Request $request)
    {
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


        if ($inputlaporan['jenislaporan'] == "Keluar masuk barang") {
            $LaporanBarang =  $this->GetKeluarMasukBarang($tanggalawalLaporan, $tanggalakhirLaporan);
            return response()->json(['stats' => 100, 'laporanbarang' => $LaporanBarang, 'jenislaporan' => $inputlaporan['jenislaporan'], 'periodeawal' => $tanggalawalLaporan, 'periodeakhir' => $tanggalakhirLaporan]);
        } else if ($inputlaporan['jenislaporan'] == "Persediaan stok barang") {
            $StockBarang = $this->GetPersediaanBarang($tanggalawalLaporan, $tanggalakhirLaporan);
            return response()->json(['stats'=>200, 'stockbarang' => $StockBarang, 'jenislaporan'=> $inputlaporan['jenislaporan'], 'periodeawal' => $tanggalawalLaporan, 'periodeakhir' => $tanggalakhirLaporan]);
        } else if ($inputlaporan['jenislaporan'] == "Barang akan kadaluarsa") {
            $BarangAkanKadalurasa = $this->GetBarangKadaluarsa($tanggalawalLaporan, $tanggalakhirLaporan);
            return response()->json(['stats' => 300, 'laporanbarang' => $BarangAkanKadalurasa, 'jenislaporan' => $inputlaporan['jenislaporan'], 'periodeawal' => $tanggalawalLaporan, 'periodeakhir' => $tanggalakhirLaporan]);
        } else if ($inputlaporan['jenislaporan'] == "Barang akan habis") {
            $BarangAkanHabis = $this->GetBarangHabis($tanggalawalLaporan, $tanggalakhirLaporan);
            return response()->json(['stats' => 400, 'laporanbarang' => $BarangAkanHabis, 'jenislaporan' => $inputlaporan['jenislaporan'], 'periodeawal' => $tanggalawalLaporan, 'periodeakhir' => $tanggalakhirLaporan]);
        }
    }

    public function GetKeluarMasukBarang($tanggalawalLaporan, $tanggalakhirLaporan)
    {
        $LaporanBarangKeluarDifTanggal = BarangUMKM::leftJoin(DB::raw("(SELECT * FROM transaksi_barang_masuk WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') AND DATE_FORMAT('" . $tanggalakhirLaporan . "','%Y-%m-%d')) TransBarangMasuk"), function ($join3) {
            $join3->on('barang_umkm.id', '=', 'TransBarangMasuk.barang_umkm_id');
        })->leftJoin(DB::raw("(SELECT * FROM transaksi_barang_keluar WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') AND DATE_FORMAT('" . $tanggalakhirLaporan . "','%Y-%m-%d')) TransBarangKeluar"), function ($join4) {
            $join4->on('TransBarangMasuk.id', '=', 'TransBarangKeluar.transaksi_barang_masuk_id');
        })->where(DB::raw("DATE_FORMAT(TransBarangMasuk.created_at, '%Y-%m-%d')"), "!=", DB::raw("DATE_FORMAT(TransBarangKeluar.created_at, '%Y-%m-%d')"))->select('barang_umkm.id', DB::raw("TransBarangMasuk.id as barangmasukid, NULL as nama, NULL as Stockfinalawal, NULL as barangmasuk, DATE_FORMAT(TransBarangKeluar.created_at, '%Y-%m-%d') as tanggalmasukbarang, TransBarangKeluar.jumlah as barangkeluar, DATE_FORMAT(TransBarangKeluar.created_at,'%Y-%m-%d') as tanggalkeluarbarang"));

        $LaporanBarang = BarangUMKM::join(DB::raw("(SELECT final.id as id , final.nama, SUM(final.StockAwalAkhir) as Stockfinalawal FROM (SELECT bum.id, bum.nama, fin.StockTotalMasuk, fin.StockTotalKeluar, (CASE WHEN fin.StockTotalMasuk IS NULL THEN 0 ELSE fin.StockTotalMasuk END - CASE WHEN fin.StockTotalKeluar IS NULL THEN 0 ELSE fin.StockTotalKeluar END) as StockAwalAkhir  FROM barang_umkm bum LEFT JOIN 
        (SELECT tbm.barang_umkm_id, SUM(tbm.stockawal) as StockTotalMasuk, SUM(tbk.TotalBarangKeluar) as StockTotalKeluar FROM transaksi_barang_masuk tbm LEFT JOIN(
        SELECT transaksi_barang_masuk_id, SUM(jumlah) as TotalBarangKeluar FROM transaksi_barang_keluar WHERE DATE_FORMAT(CREATED_AT, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') GROUP BY transaksi_barang_masuk_id) tbk on tbm.id = tbk.transaksi_barang_masuk_id WHERE DATE_FORMAT(tbm.CREATED_AT, '%Y-%m-%d') < DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') GROUP BY tbm.barang_umkm_id) fin on bum.id = fin.barang_umkm_id) final GROUP BY final.id, final.nama) combinestock
        "), function ($join) {
            $join->on('barang_umkm.id', '=', 'combinestock.id');
        })->leftJoin(DB::raw("(SELECT * FROM transaksi_barang_masuk WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') AND DATE_FORMAT('" . $tanggalakhirLaporan . "','%Y-%m-%d')) TransaksiBarangMasuk"), function ($join1) {
            $join1->on('barang_umkm.id', '=', 'TransaksiBarangMasuk.barang_umkm_id');
        })->leftJoin(DB::raw("(SELECT * FROM transaksi_barang_keluar WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') AND DATE_FORMAT('" . $tanggalakhirLaporan . "','%Y-%m-%d')) TransaksiBarangKeluar"), function ($join2) {
            $join2->on('TransaksiBarangMasuk.id', '=', 'TransaksiBarangKeluar.transaksi_barang_masuk_id');
            $join2->on(DB::raw("DATE_FORMAT(TransaksiBarangMasuk.created_at, '%Y-%m-%d')"), "=", DB::raw("DATE_FORMAT(TransaksiBarangKeluar.created_at, '%Y-%m-%d')"));
        })->whereRaw(DB::raw('(TransaksiBarangMasuk.stockawal IS NOT NULL OR TransaksiBarangKeluar.jumlah IS NOT NULL)'))->WHERE('barang_umkm.user_id', '=', auth()->user()->id)->select('barang_umkm.id', DB::raw('TransaksiBarangMasuk.id as barangmasukid'), 'barang_umkm.nama', 'combinestock.Stockfinalawal', DB::raw("TransaksiBarangMasuk.stockawal as barangmasuk, DATE_FORMAT(TransaksiBarangMasuk.created_at, '%Y-%m-%d') as tanggalmasukbarang, TransaksiBarangKeluar.jumlah as barangkeluar, DATE_FORMAT(TransaksiBarangKeluar.created_at, '%Y-%m-%d') as tanggalkeluarbarang"))->union($LaporanBarangKeluarDifTanggal)->orderBy('id', 'ASC')->orderBy('tanggalmasukbarang', 'ASC')->get();
        return $LaporanBarang;
    }

    public function GetPersediaanBarang($tanggalawalLaporan, $tanggalakhirLaporan){
        $persediaanStockBarang = BarangUMKM::join(DB::raw("(SELECT a.barang_umkm_id, SUM(a.stockawal) as StockMasuk, SUM(b.total) as StockKeluar FROM transaksi_barang_masuk a LEFT JOIN(SELECT transaksi_barang_masuk_id, SUM(jumlah) as total FROM transaksi_barang_keluar WHERE DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') AND DATE_FORMAT('" . $tanggalakhirLaporan . "','%Y-%m-%d') GROUP BY transaksi_barang_masuk_id) b 
        on a.id = b.transaksi_barang_masuk_id where DATE_FORMAT(a.created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') AND DATE_FORMAT('" . $tanggalakhirLaporan . "','%Y-%m-%d') GROUP BY a.barang_umkm_id) final")
        , function($join){
            $join->on('barang_umkm.id', '=', 'final.barang_umkm_id');
        })->where('barang_umkm.user_id', '=', auth()->user()->id)->select('barang_umkm.id', 'barang_umkm.nama', 'final.barang_umkm_id', 'final.StockMasuk', 'final.StockKeluar')->get();
        return $persediaanStockBarang;
    }

    public function GetBarangKadaluarsa($tanggalawalLaporan, $tanggalakhirLaporan)
    {
        $BarangAkanKadalurasa = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('*', DB::raw('CURDATE() as Date_Today'))->whereRaw(DB::raw("((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa)) AND (DATE_FORMAT(transaksi_barang_masuk.created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') AND DATE_FORMAT('" . $tanggalakhirLaporan . "','%Y-%m-%d'))"))->where('user_id', '=', auth()->user()->id)->select('transaksi_barang_masuk.id', 'transaksi_barang_masuk.barang_umkm_id', 'barang_umkm.nama', 'harga', 'jumlah', 'tanggal_kadaluarsa', DB::raw("DATE_FORMAT(transaksi_barang_masuk.created_at, '%Y-%m-%d') as TanggalMasukBarang"))->get();
        return $BarangAkanKadalurasa;
    }

    public function GetBarangHabis($tanggalawalLaporan, $tanggalakhirLaporan)
    {
        $BarangAkanHabis = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id', 'barang_umkm.id', 'barang_umkm.nama')->having(DB::raw('SUM(jumlah)'), '<', 10)->select('barang_umkm_id', 'barang_umkm.id', 'barang_umkm.nama', DB::raw('SUM(jumlah) as total'))->whereRaw(DB::raw("(DATE_FORMAT(transaksi_barang_masuk.created_at, '%Y-%m-%d') BETWEEN DATE_FORMAT('" . $tanggalawalLaporan . "','%Y-%m-%d') AND DATE_FORMAT('" . $tanggalakhirLaporan . "','%Y-%m-%d'))"))->where('user_id', '=', auth()->user()->id)->get();
        return $BarangAkanHabis;
    }

    public function cetak_pdf()
    {
        $jenis = str_replace('%20', ' ', request()->jenis_laporan);
        $tanggalawalLaporan = request()->start;
        $tanggalakhirLaporan = request()->end;

        $table_head = [
            "Barang akan kadaluarsa" =>
            ['ID Barang', 'Tanggal Masuk Barang', 'Nama Barang', "Tanggal Kadaluarsa", 'Jumlah Barang'],
            "Keluar masuk barang" =>
            ['ID Barang', 'Nama Barang', 'Stok Awal', 'Masuk', 'Tanggal Masuk', 'Keluar', 'Tanggal Keluar', 'Stok Akhir'],
            "Persediaan stok barang" =>
            ['ID Barang', 'Nama Barang', 'Jumlah Barang Masuk', 'Jumlah Barang Keluar'],
            "Barang akan habis" =>
            ['ID Barang', 'Nama Barang', 'Jumlah Barang'],
        ];
        if ($jenis == "Keluar masuk barang") {
            $LaporanBarang =  $this->GetKeluarMasukBarang($tanggalawalLaporan, $tanggalakhirLaporan);
            $barang_arrange = [];
            $prevStockAkhir = "";
            foreach($LaporanBarang as $key => $data) {
                    $nama = $data->nama;
                    $id = $data->id;
                    $stockAwal = $data->Stockfinalawal;
                    $stockAkhir = $data->Stockfinalawal + $data->barangmasuk - $data->barangkeluar;

                    if($key!= 0){
                        if($id == $LaporanBarang[$key-1]->id){
                            $nama = "---";
                            $id = "---";
                            $stockAwal = $prevStockAkhir;
                            $stockAkhir = $stockAwal + $data->barangmasuk - $data->barangkeluar;
                        }
                    }
                    
                    $newData = [ 
                        $id,
                        $nama, 
                        $stockAwal, 
                        $data->barangmasuk, 
                        $data->tanggalmasukbarang,
                        $data->barangkeluar,
                        $data->tanggalkeluarbarang,
                        $stockAkhir
                    ];

                    $prevStockAkhir = $stockAwal + $data->barangmasuk - $data->barangkeluar;
                    array_push($barang_arrange, $newData);
            }

            $pdf = PDF::loadView('isilaporan', ['LaporanBarang' => $barang_arrange, 'jenis' => $jenis, 'tanggalawalLaporan' => $tanggalawalLaporan, 'tanggalakhirLaporan' => $tanggalakhirLaporan, 'table_head' => $table_head[$jenis]]);
            return $pdf->download('Laporan - Keluar Masuk Barang.pdf');
        } else if ($jenis == "Persediaan stok barang") {
            $LaporanBarang =  $this->GetPersediaanBarang($tanggalawalLaporan, $tanggalakhirLaporan);
            $barang_arrange = [];
            foreach($LaporanBarang as $data) {
                    $newData = [ 
                        $data->id, 
                        $data->nama, 
                        $data->StockMasuk, 
                        $data->StockKeluar,
                    ];
                    array_push($barang_arrange, $newData);
            }
            $pdf = PDF::loadView('isilaporan', ['LaporanBarang' => $barang_arrange, 'jenis' => $jenis, 'tanggalawalLaporan' => $tanggalawalLaporan, 'tanggalakhirLaporan' => $tanggalakhirLaporan, 'table_head' => $table_head[$jenis]]);
            return $pdf->download('Laporan - Persediaan Stok Barang.pdf');
        } else if ($jenis == "Barang akan kadaluarsa") {
            $BarangAkanKadaluarsa = $this->GetBarangKadaluarsa($tanggalawalLaporan, $tanggalakhirLaporan);
            // dd($BarangAkanKadaluarsa);
            $barang_arrange = [];
            foreach($BarangAkanKadaluarsa as $data) {
                    $newData = [ 
                        $data->id, 
                        $data->TanggalMasukBarang, 
                        $data->nama, 
                        $data->tanggal_kadaluarsa,
                        $data->jumlah];
                    array_push($barang_arrange, $newData);
            }
            $pdf = PDF::loadView('isilaporan', ['LaporanBarang' => $barang_arrange, 'jenis' => $jenis, 'tanggalawalLaporan' => $tanggalawalLaporan, 'tanggalakhirLaporan' => $tanggalakhirLaporan, 'table_head' => $table_head[$jenis]]);
            return $pdf->download('Laporan - Barang Akan Kadaluarsa.pdf');
        } else if ($jenis == "Barang akan habis") {
            $LaporanBarang = $this->GetBarangHabis($tanggalawalLaporan, $tanggalakhirLaporan);
            $barang_arrange = [];
            foreach($LaporanBarang as $data) {
                    $newData = [ 
                        $data->id, 
                        $data->nama, 
                        $data->total];
                    array_push($barang_arrange, $newData);
            }
            $pdf = PDF::loadView('isilaporan', ['LaporanBarang' => $barang_arrange, 'jenis' => $jenis, 'tanggalawalLaporan' => $tanggalawalLaporan, 'tanggalakhirLaporan' => $tanggalakhirLaporan, 'table_head' => $table_head[$jenis]]);
            return $pdf->download('Laporan - Barang Akan Habis.pdf');
        }

        // $barang = BarangPemasok::all();
        // $pdf = PDF::loadView('isilaporan', ['barang'=>$barang]);
        // return $pdf->download('laporan-pdf.pdf');
    }
}
