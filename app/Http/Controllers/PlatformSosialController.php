<?php

namespace App\Http\Controllers;

use App\Models\PlatformSosial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Support\Facades\DB;
class PlatformSosialController extends Controller
{
    public function getindex($id)
    {
        $PlatformSosial = $this->getPlatformSosial($id);
        $TotalNotif = 0;
        $CountBarang = $this->countNotifikasi();
        for ($i = 0; $i < COUNT($CountBarang); $i++) {
            if ($CountBarang[$i]['notif_flag'] == 0) {
                $TotalNotif += 1;
            } else {
                $TotalNotif += 0;
            }
        }
        return view('platformsosial', ['PlatformSosial' => $PlatformSosial, 'Totalnotif' => $TotalNotif]);
    }

    public function countNotifikasi()
    {
        $BarangHabisNotif = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10");
        $AllNotifBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', 'transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->union($BarangHabisNotif)->get();
        return $AllNotifBarang;
    }

    public function getPlatformSosial($id)
    {
        $Sosial = PlatformSosial::join('users', 'users.id', '=', 'platform_sosial.user_id')->where('platform_sosial.user_id', '=', $id)->get();
        return $Sosial;
    }
}
