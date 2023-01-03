<?php

namespace App\Http\Controllers;

use App\Mail\SendNotification;
use App\Models\BarangPemasok;
use App\Models\BarangUMKM;
use App\Models\Role;
use App\Models\TransaksiBarangKeluar;
use App\Models\TransaksiBarangMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Constraint\Count;

class BerandaController extends Controller
{
    public function getindex(){
        $ListUser = User::where('role_id', '=', '2')->get();
        $flag = 1;
        $TotalNotif = 0;
        $searchbarang = request('namabarang');
        // $AllItems = BarangUMKM::where('user_id', '=', auth()->user()->id)->get();
        // $AllItems = TransaksiBarangMasuk::with('BarangUMKM')->get();
        $User = $this->CheckUser();
        if($User == 'UMKM'){
            $AllItems =  $this->GetListAllBarangUMKM($searchbarang);
        }
        else if($User == 'Pemasok'){
            $AllItems = $this->GetListAllBarangPemasok($searchbarang);
        }

        $BarangHabis = $this->GetListBarangHabis();
        $TotalBarangHabis = COUNT($BarangHabis);
        
        $PengeluranPerHari = $this->GetListBarangAkanKadaluarsa();
        $TotalPengeluranPerHari = COUNT($PengeluranPerHari);

        $BarangAkanKadaluarsa = $this->GetListPengeluaranBarangPerHari();
        $TotalBarangAkanKadaluarsa = COUNT($BarangAkanKadaluarsa);

        $ListBarang = BarangUMKM::paginate(3);

        $AllBarang = $this->GetNotifikasiBarangMasuk();

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
        // $emailuser = auth()->user()->email;
        // $username = auth()->user()->name;
        // Mail::to($emailuser)->send(new SendNotification($TotalBarangHabis, $TotalBarangAkanKadaluarsa, $username));
        return view('beranda', ['ListUser'=> $ListUser, 'flag'=>$flag, 'AllItems'=>$AllItems, 'BarangHabis'=> $BarangHabis, 'PengeluranPerHari'=> $PengeluranPerHari, 'BarangAkanKadaluarsa' => $BarangAkanKadaluarsa, 'TotalBarangHabis' => $TotalBarangHabis, 'TotalPengeluranPerHari'=>$TotalPengeluranPerHari, 'TotalBarangAkanKadaluarsa' => $TotalBarangAkanKadaluarsa, 'Listbarang' => $ListBarang, 'Totalnotif'=> $TotalNotif]);
    }


    public function GetListBarangHabis(){
        $BarangHabis = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id')->having(DB::raw('SUM(jumlah)'), '<', 10)->select('barang_umkm_id',DB::raw('SUM(jumlah) as total'))->where('user_id', '=', auth()->user()->id)->get();
        return $BarangHabis;
    }

    public function GetListBarangAkanKadaluarsa(){
        $PengeluranPerHari = TransaksiBarangKeluar::join('transaksi_barang_masuk', 'transaksi_barang_masuk.id', '=', 'transaksi_barang_keluar.transaksi_barang_masuk_id')->join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->whereRaw(DB::raw("(CURDATE() =  DATE_FORMAT(transaksi_barang_keluar.created_at, '%Y-%m-%d'))"))->where('user_id', '=', auth()->user()->id)->get();
        return $PengeluranPerHari;
    }

    public function GetListPengeluaranBarangPerHari(){
        $BarangAkanKadaluarsa = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('*', DB::raw('CURDATE() as Date_Today'))->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->get();
        return $BarangAkanKadaluarsa;
    }

    public function CheckUser(){
        $Check = Role::where('id', '=', auth()->user()->role_id)->first();
        return $Check->name;
    }

    public function GetListAllBarangUMKM($searchbarang){
        if($searchbarang){
            $AllItems = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id')->select('barang_umkm_id',DB::raw('count(barang_umkm_id) as totalAll, SUM(jumlah) as total'))->where('nama', 'LIKE', "%" . $searchbarang . "%")->where('user_id', '=', auth()->user()->id)->paginate(3);
        }
        else{
            $AllItems = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id')->select('barang_umkm_id',DB::raw('count(barang_umkm_id) as totalAll, SUM(jumlah) as total'))->where('user_id', '=', auth()->user()->id)->paginate(3);
        }
        return $AllItems;
    }

    public function GetListAllBarangPemasok($searchbarang){
        if($searchbarang){
            $AllItems = BarangPemasok::where('user_id', '=', auth()->user()->id)->where('nama', 'LIKE', "%" . $searchbarang . "%")->paginate(3);
        }
        else{
            $AllItems = BarangPemasok::where('user_id', '=', auth()->user()->id)->paginate(3);
        }
        return $AllItems;
    }

    public function GetNotifikasiBarangMasuk(){
        $BarangHabisNotif = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10");
        $AllNotifBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id','transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->union($BarangHabisNotif)->paginate(3);
        return $AllNotifBarang;
    }

    
}
