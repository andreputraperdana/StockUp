<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use Illuminate\Http\Request;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function getindex($id)
    {
        $BarangDetail = $this->getBarangPemasokByID($id);
        $BarangRandom = $this->getBarangRandom();
        $TotalNotif = 0;
        $CountBarang = $this->countNotifikasi();
        for ($i = 0; $i < COUNT($CountBarang); $i++) {
            if ($CountBarang[$i]['notif_flag'] == 0) {
                $TotalNotif += 1;
            } else {
                $TotalNotif += 0;
            }
        }
        // return redirect()->route('item', ['id' => $id])->with('BarangDetail', $BarangDetail);
        return view('item', ['BarangDetail' => $BarangDetail, 'BarangRandom' => $BarangRandom, 'Totalnotif' => $TotalNotif]);
    }

    public function countNotifikasi()
    {
        $BarangHabisNotif = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10");
        $AllNotifBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', 'transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->union($BarangHabisNotif)->get();
        return $AllNotifBarang;
    }

    public function getBarangPemasokByID($id)
    {
        $BarangDetail = BarangPemasok::join('users', 'users.id', '=', 'barang_pemasok.user_id')->where('barang_pemasok.id', '=', $id)->get();
        return $BarangDetail;
    }

    public function getBarangRandom()
    {
        $BarangRandom =  BarangPemasok::inRandomOrder()->limit(4)->get();
        return $BarangRandom;
    }
}
