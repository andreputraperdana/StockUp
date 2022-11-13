<?php

namespace App\Http\Controllers;

use App\Mail\SendNotification;
use App\Models\BarangUMKM;
use App\Models\TransaksiBarangKeluar;
use App\Models\TransaksiBarangMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BerandaController extends Controller
{
    public function getindex(){
        $ListUser = User::where('role_id', '=', '2')->get();
        $flag = 1;
        $TotalNotif = 0;
        // $AllItems = BarangUMKM::where('user_id', '=', auth()->user()->id)->get();
        // $AllItems = TransaksiBarangMasuk::with('BarangUMKM')->get();
        $AllItems = TransaksiBarangMasuk::groupBy('barang_umkm_id')->select('barang_umkm_id',DB::raw('count(barang_umkm_id) as totalAll'))->paginate(3);
        $BarangHabis = TransaksiBarangMasuk::WHERE('jumlah', '<', '5')->get();
        $PengeluranPerHari = TransaksiBarangKeluar::all();
        $ListBarang = BarangUMKM::paginate(3);
        $BarangAkanKadaluarsa = TransaksiBarangMasuk::select('*', DB::raw('CURDATE() as Date_Today'))->whereRaw(DB::raw('(CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa)'))->get();
     
        $TotalBarangHabis = COUNT($BarangHabis);    
        $TotalPengeluranPerHari = COUNT($PengeluranPerHari);
        $TotalBarangAkanKadaluarsa = COUNT($BarangAkanKadaluarsa);

        $AllBarang = TransaksiBarangMasuk::select('*', DB::raw('CURDATE() as Date_Today'))->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa)) OR jumlah < 5'))->get();

        for($i=0; $i<COUNT($AllBarang); $i++){
            if($AllBarang[$i]['notif_flag'] == 0){
                $TotalNotif+=1;
            }
            else{
                $TotalNotif+=0;
            }
        }

        // dd($TotalNotif);
        // $today = date("Y-m-d");
        // $test = DB::raw('DATE_ADD($today, INTERVAL 1 DAY)');
        // dd($BarangHabis);
        $emailuser = auth()->user()->email;
        $username = auth()->user()->name;
        // Mail::to($emailuser)->send(new SendNotification($TotalBarangHabis, $TotalBarangAkanKadaluarsa, $username));
        return view('beranda', ['ListUser'=> $ListUser, 'flag'=>$flag, 'AllItems'=>$AllItems, 'BarangHabis'=> $BarangHabis, 'PengeluranPerHari'=> $PengeluranPerHari, 'BarangAkanKadaluarsa' => $BarangAkanKadaluarsa, 'TotalBarangHabis' => $TotalBarangHabis, 'TotalPengeluranPerHari'=>$TotalPengeluranPerHari, 'TotalBarangAkanKadaluarsa' => $TotalBarangAkanKadaluarsa, 'Listbarang' => $ListBarang, 'Totalnotif'=> $TotalNotif]);
    }
}
