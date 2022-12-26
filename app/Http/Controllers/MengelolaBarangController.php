<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use Illuminate\Http\Request;
use App\Models\BarangUMKM;
use App\Models\TransaksiBarangKeluar;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;
use PhpParser\Node\Expr\Isset_;

class MengelolaBarangController extends Controller
{
    public function getindex()
    {
        $auth = Auth::user();
        if($auth->role_id == 1){
            $flag = 4;
            // $AllItems = TransaksiBarangMasuk::groupBy('barang_umkm_id')->select('barang_umkm_id', DB::raw('SUM(jumlah) as total'))->get();
            $AllItems = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id')->select('barang_umkm_id', DB::raw('SUM(jumlah) as total'))->paginate(3);
            if (request('search')) {
                $cari = request('search');
                $AllItems = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id')->select('barang_umkm_id', DB::raw('SUM(jumlah) as total'))->where('barang_umkm.nama', 'like', "%" . $cari . "%")->paginate(3);
            }
        }else if($auth->role_id == 2){
            $flag = 4;
            $AllItems = BarangPemasok::all()->where('user_id', '=', $auth->id);
        }

        return view('mengelolabarang', ['flag' => $flag, 'AllItems' => $AllItems]);
    }

    public function destroy($id)
    {
        $auth = Auth::user();
        if($auth->role_id == 1){
            DB::delete('DELETE FROM barang_umkm WHERE id = ?', [$id]);
            return redirect('mengelolabarang')->with('success', 'Barang Telah Di hapus');
        }else if($auth->role_id == 2){
            DB::delete('DELETE FROM barang_pemasok WHERE id = ?', [$id]);
            return redirect('mengelolabarang')->with('success', 'Barang Telah Di hapus');
        }
    }

    public function ajaxData()
    {
        $BarangMasuk = DB::select('select * from transaksi_barang_masuk where barang_umkm_id = 1');
        return response()->json(['BarangMasuk' => $BarangMasuk]);
    }

    public function keluarbarang(Request $request){
        $inputbarangkeluar = $request->all();
        $NewBarangKeluar = new TransaksiBarangKeluar();
        $idTransaksi = $inputbarangkeluar['listid_tanggal'];
        $BarangMasuk = TransaksiBarangMasuk::where('id', '=', $idTransaksi)->first();
        if($inputbarangkeluar['pengeluaran'] == "Manual"){
            $BarangMasuk['jumlah'] -= $inputbarangkeluar['kuantitas'];
            $BarangMasuk->save();
            $NewBarangKeluar['transaksi_barang_masuk_id'] = $BarangMasuk['id'];
            $NewBarangKeluar['jumlah'] = $inputbarangkeluar['kuantitas'];
            $NewBarangKeluar->save();
        }
        else if($inputbarangkeluar['pengeluaran'] == "FIFO"){   
            $BarangUMKMid =  $inputbarangkeluar['barangid'];
            $BarangFIFO = TransaksiBarangMasuk::where('id', '=', $BarangUMKMid)->first();
            $BarangFIFO['jumlah'] -= $inputbarangkeluar['kuantitas'];
            $BarangFIFO->save();
            $NewBarangKeluar['transaksi_barang_masuk_id'] = $BarangUMKMid;
            $NewBarangKeluar['jumlah'] = $inputbarangkeluar['kuantitas'];
            $NewBarangKeluar->save();
        }

        return redirect()->back();
    }
}
