<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiBarangMasuk;


class TokoController extends Controller
{
    public function getindex()
    {
        $TotalNotif = 0;
        $filterTanggal = request('filterTanggal');
        $flag = 5;
        $Item = BarangPemasok::paginate(12);
        $Kategori = BarangPemasok::select('jenis', DB::raw('count(*) as total'))->groupBy('jenis')->get();
        $CountBarang = $this->countNotifikasi();
        for ($i = 0; $i < COUNT($CountBarang); $i++) {
            if ($CountBarang[$i]['notif_flag'] == 0) {
                $TotalNotif += 1;
            } else {
                $TotalNotif += 0;
            }
        }
        return view('toko', ['flag' => $flag, 'Item' => $Item, 'Kategori' => $Kategori, 'Totalnotif' => $TotalNotif]);
    }

    public function countNotifikasi()
    {
        $BarangHabisNotif = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10");
        $AllNotifBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', 'transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->union($BarangHabisNotif)->get();
        return $AllNotifBarang;
    }

    public function getDataByKategori($jenis)
    {
        $flag = 5;
        $TotalNotif = 0;
        $Item = BarangPemasok::where('jenis', '=', $jenis)->paginate(12);
        $Kategori = BarangPemasok::select('jenis', DB::raw('count(*) as total'))->groupBy('jenis')->get();
        $CountBarang = $this->countNotifikasi();
        for ($i = 0; $i < COUNT($CountBarang); $i++) {
            if ($CountBarang[$i]['notif_flag'] == 0) {
                $TotalNotif += 1;
            } else {
                $TotalNotif += 0;
            }
        }
        return view('toko', ['flag' => $flag, 'Item' => $Item, 'Kategori' => $Kategori, 'Totalnotif' => $TotalNotif]);
    }
}
