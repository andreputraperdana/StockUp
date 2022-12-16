<?php

namespace App\Http\Controllers;

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
        $flag = 4;
        // $AllItems = TransaksiBarangMasuk::groupBy('barang_umkm_id')->select('barang_umkm_id', DB::raw('SUM(jumlah) as total'))->get();
        $AllItems = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id')->select('barang_umkm_id', DB::raw('SUM(jumlah) as total'))->paginate(3);
        if (request('search')) {
            $cari = request('search');
            $AllItems = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->groupBy('barang_umkm_id')->select('barang_umkm_id', DB::raw('SUM(jumlah) as total'))->where('barang_umkm.nama', 'like', "%" . $cari . "%")->paginate(3);
        }
        // $Size = count($AllItems);

        return view('mengelolabarang', ['flag' => $flag, 'AllItems' => $AllItems]);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM barang_umkm WHERE id = ?', [$id]);
        return redirect('mengelolabarang')->with('success', 'Barang Telah Di hapus');
    }

    public function ajaxData()
    {
        $BarangMasuk = DB::select('select * from transaksi_barang_masuk where barang_umkm_id = 1');
        return response()->json(['BarangMasuk' => $BarangMasuk]);
    }

    public function keluarbarang(Request $request){
        $inputbarangkeluar = $request->all();
        // dd($inputbarangkeluar);
        $NewBarangKeluar = new TransaksiBarangKeluar();
        $idTransaksi = $inputbarangkeluar['listid_tanggal'];
        $BarangMasuk = TransaksiBarangMasuk::where('id', '=', $idTransaksi)->first();
        if($inputbarangkeluar['pengeluaran'] == "Manual"){
            $BarangMasuk['jumlah'] -= $inputbarangkeluar['kuantitas'];
            $BarangMasuk->save();
            $NewBarangKeluar['barang_umkm_id'] = $BarangMasuk['barang_umkm_id'];
            $NewBarangKeluar['jumlah'] = $inputbarangkeluar['kuantitas'];
            $NewBarangKeluar->save();
        }
        else if($inputbarangkeluar['pengeluaran'] == "FIFO"){   
            $BarangUMKMid =  $BarangMasuk['barang_umkm_id'];
            $BarangFIFO = TransaksiBarangMasuk::where('id', '=', $BarangUMKMid)->first();
            $BarangFIFO['jumlah'] -= $inputbarangkeluar['kuantitas'];
            $BarangFIFO->save();
            $NewBarangKeluar['barang_umkm_id'] = $BarangUMKMid;
            $NewBarangKeluar['jumlah'] = $inputbarangkeluar['kuantitas'];
            $NewBarangKeluar->save();
        }

        return redirect()->back();
    }
}
