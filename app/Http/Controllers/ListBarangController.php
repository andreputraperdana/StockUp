<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use App\Models\BarangUMKM;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListBarangController extends Controller
{
    public function getindex($id)
    {
        $hasil = TransaksiBarangMasuk::where('barang_umkm_id', '=', $id)->whereraw(DB::raw('(jumlah > 0)'))->get();
        return view('listbarang',  ['hasil' => $hasil]);
    }

    public function destroy($id)
    {
        if(auth()->user()->role_id == 1){
            $barangUMKMIDSearch = TransaksiBarangMasuk::where('id', '=', $id)->first();
            $barangUMKMID = $barangUMKMIDSearch['barang_umkm_id'];
            $transaksiBarangMasuk = TransaksiBarangMasuk::where('barang_umkm_id', '=', $barangUMKMID)->count();
            if ($transaksiBarangMasuk == 1) {
                DB::delete('DELETE FROM barang_umkm WHERE id = ?', [$barangUMKMID]);
            } else {
                DB::delete('DELETE FROM transaksi_barang_masuk WHERE id = ?', [$id]);
            }
            return response()->json(['stats' => 'Data berhasil dihapus']);
        }
        else if(auth()->user()->role_id == 2){
            DB::delete('DELETE FROM barang_pemasok WHERE id = ?', [$id]);
            return response()->json(['stats' => 'Data berhasil dihapus']);
        }
    }
}
