<?php

namespace App\Http\Controllers;

use App\Models\BarangUMKM;
use App\Models\TransaksiBarangKeluar;
use App\Models\TransaksiBarangMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function getindex(){
        $ListUser = User::where('role_id', '=', '2')->get();
        $flag = 1;
        // $AllItems = BarangUMKM::where('user_id', '=', auth()->user()->id)->get();
        // $AllItems = TransaksiBarangMasuk::with('BarangUMKM')->get();
        $AllItems = TransaksiBarangMasuk::groupBy('barang_umkm_id')->select('barang_umkm_id',DB::raw('count(barang_umkm_id) as totalAll'))->get();
        $BarangHabis = BarangUMKM::WHERE('total', '<', '5')->get();
        $PengeluranPerHari = TransaksiBarangKeluar::all();
        // $BarangAkanKadaluarsa = TransaksiBarangMasuk::WHERE('')
        return view('beranda', ['ListUser'=> $ListUser, 'flag'=>$flag, 'AllItems'=>$AllItems, 'BarangHabis'=> $BarangHabis, 'PengeluranPerHari'=> $PengeluranPerHari]);
    }
}
