<?php

namespace App\Http\Controllers;

use App\Models\TransaksiBarangMasuk;
use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Type;
use PHPUnit\Framework\Constraint\Count;

class NotifikasiController extends Controller
{
    public function getindex(){
        $BarangHabis = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10");
        $AllBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id','transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->union($BarangHabis)->paginate(3);
        // dd($AllBarang);
        $countAllBarang = Count($AllBarang);
        return view('notifikasi', ['AllBarang'=> $AllBarang, 'countAllBarang' => $countAllBarang]);
    }

    // public function filternotif($id){
    //     if($id === '1'){
    //         $AllBarangHabis = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10")->paginate(3);
    //         return response()->json(['stats'=>200, 'Allbaranghabis'=> $AllBarangHabis, 'jenis'=> $id]);

    //     }
    //     else if($id === '2'){
    //         $AllBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id','transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->paginate(3);
    //     }
    //     else if($id === '3'){
    //         $BarangHabis = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10");
    //         $AllBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id','transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->union($BarangHabis)->paginate(3);
    //         // dd($AllBarang);
    //     }
    //     // return view('notifikasi', ['Allbarang'=> $AllBarang, 'jenis'=> $id]);
    //     return response()->json(['stats'=>200, 'Allbarang'=> $AllBarang, 'jenis'=> $id]);
    //     // return view('notifikasi', compact('Allbarang'))->render();
    // }

    // public function postdetail(Request $request){
    //     $hasil = $request->input();
    //     // dd($hasil);
    //     if($hasil['tipe_notif'] == 'BarangKadaluarsa'){
    //         $idbarang = $hasil['id_barang'];
    //         $searchbarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->where('transaksi_barang_masuk.id', '=', $idbarang)->select('barang_umkm.nama','barang_umkm.foto_barang', 'jenis','transaksi_barang_masuk.*')->first();
    //         $searchbarang->notif_flag = 1;
    //         $searchbarang->save();
    //         // dd("masup if");
    //         return response()->json(['stats'=>200, 'detailbarang'=> $searchbarang]);
    //     }
    //     else if($hasil['tipe_notif'] == 'BarangHabis'){
    //         // dd("masup else if");
    //         $idbarangUMKM = $hasil['id_barang'];
    //         $searchbarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->where('transaksi_barang_masuk.barang_umkm_id', '=', $idbarangUMKM)->select('barang_umkm.nama', 'jenis','transaksi_barang_masuk.*')->get();
    //         $searchbarangnotif = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->where('transaksi_barang_masuk.barang_umkm_id', '=', $idbarangUMKM)->select('barang_umkm.nama', 'barang_umkm.foto_barang', 'jenis','transaksi_barang_masuk.*')->first();
    //         // dd($searchbarangnotif);
    //         $searchbarangnotif->notif_flag = 1;
    //         $searchbarangnotif->save();
    //         return response()->json(['stats'=>300, 'detailbarang'=> $searchbarang]);
    //     }
    // }

    public function fetch_data(Request $request){
        // dd("ga masuk");
        if($request->ajax()){
            $id = $request -> code;
            // dd($id);
            // if($id){
                if($id === '1'){
                    $AllBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10")->paginate(3);
                    // return response()->json(['stats'=>200, 'Allbaranghabis'=> $AllBarangHabis, 'jenis'=> $id]);
        
                }
                else if($id === '2'){
                    $AllBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id','transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->paginate(3);
                }
                else if($id === '3'){
                    $BarangHabis = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10");
                    $AllBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id','transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->union($BarangHabis)->paginate(3);
                    // dd($AllBarang);
                }
            // } else{
            //     $BarangHabis = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10");
            //     $AllBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id','transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->union($BarangHabis)->paginate(3);
            // }
            // dd($AllBarang);
            
            return view('pagination', compact('AllBarang'));
            // return response()->json(['stats'=>300, 'Allbarang'=> $AllBarang]);
        }
    }

    public function postdetail(Request $request){
        $hasil = $request->input();
        if($hasil['tipe_notif'] == 'BarangKadaluarsa'){
            $idbarang = $hasil['id_barang'];
            $searchbarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->where('transaksi_barang_masuk.id', '=', $idbarang)->select('barang_umkm.nama', 'barang_umkm.foto_barang', 'jenis','transaksi_barang_masuk.*')->first();
            $searchbarang->notif_flag = 1;
            $searchbarang->save();
            // dd($searchbarang);
            return response()->json(['stats'=>200, 'detailbarang'=> $searchbarang]);
        }
        else if($hasil['tipe_notif'] == 'BarangHabis'){
            $idbarangUMKM = $hasil['id_barang'];
            $searchbarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->where('transaksi_barang_masuk.barang_umkm_id', '=', $idbarangUMKM)->select('barang_umkm.nama', 'barang_umkm.foto_barang', 'jenis','transaksi_barang_masuk.*')->get();
            $searchbarangnotif = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->where('transaksi_barang_masuk.barang_umkm_id', '=', $idbarangUMKM)->select('barang_umkm.nama','barang_umkm.foto_barang', 'jenis','transaksi_barang_masuk.*')->first();
            $searchbarangnotif->notif_flag = 1;
            $searchbarangnotif->save();
            return response()->json(['stats'=>300, 'detailbarang'=> $searchbarang]);
        }
    }

    
}
