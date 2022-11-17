<?php

namespace App\Http\Controllers;

use App\Models\TransaksiBarangMasuk;
use Illuminate\Support\Facades\DB;

class ListBarangController extends Controller
{
    public function getindex($id){
        $hasil = TransaksiBarangMasuk::where('barang_umkm_id', '=', $id)->get();
        return view('listbarang',  ['hasil'=> $hasil]);
    }

    public function destroy($id){
        DB::delete('DELETE FROM transaksi_barang_masuk WHERE id = ?', [$id]);
        return redirect('mengelolabarang')->with('success','Barang Telah Di hapus');
    }
}