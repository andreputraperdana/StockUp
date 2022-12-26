<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use Illuminate\Http\Request;
use App\Models\TransaksiBarangMasuk;
use App\Models\BarangUMKM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditBarangController extends Controller
{
    public function getindex($id)
    {
        $auth = Auth::user();
        if($auth->role_id == 1){
            $hasil = DB::table('barang_umkm')
                ->join('transaksi_barang_masuk', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')
                ->where('transaksi_barang_masuk.id', '=', $id)->get();
            }else{
                $hasil = DB::table('barang_pemasok')->where('id', '=', $id)->get();
            }
            return view('editbarang', ['hasil' => $hasil]);
    }

    public function update(Request $request)
    {
        $auth = Auth::user();
        if($auth->role_id == 1){
            $output = $request->input();
            $checkbarang = BarangUMKM::where('id', $request->idbarang)->first();
            $transaksibarangmasuk = TransaksiBarangMasuk::where('barang_umkm_id', $checkbarang->id)->first();
            $transaksibarangmasuk->barang_umkm_id = $checkbarang->id;
            $transaksibarangmasuk->jumlah = $output['jumlahbarang'];
            $checkbarang->jenis = $output['kategori'];
            $checkbarang->update();
            $transaksibarangmasuk->harga = $output['hargabarang'];
            $transaksibarangmasuk->tanggal_kadaluarsa = $output['tanggalkadaluarsa'];
            $transaksibarangmasuk->notif_flag = 0;
            $transaksibarangmasuk->update();
            if($request->file('fotobarang') != null){
                $filenameWithExt = $request->file('fotobarang')->getClientOriginalName();
                // Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just Extension
                $extension = $request->file('fotobarang')->getClientOriginalExtension();
                // Filename To store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $request->file('fotobarang')->move('public/image', $fileNameToStore);
                $checkbarang->foto_barang = $fileNameToStore;
                $checkbarang->update();
            }
        }else{
            $output = $request->input();
            $checkbarang = BarangPemasok::where('id', $request->idbarang)->first();
            $checkbarang->nama = $output['namabarang'];
            $checkbarang->jenis = $output['kategori'];
            $checkbarang->harga = $output['hargabarang'];
            $checkbarang->deskripsi = $output['deskripsi'];
            if($request->file('fotobarang') != null){
                $filenameWithExt = $request->file('fotobarang')->getClientOriginalName();
                // Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just Extension
                $extension = $request->file('fotobarang')->getClientOriginalExtension();
                // Filename To store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $request->file('fotobarang')->move('public/image', $fileNameToStore);
                $checkbarang->foto_barang = $fileNameToStore;
            }
            $checkbarang->update();
        }

        return redirect('/mengelolabarang')->with('status', 'Data siswa Berhasil Diubah');
    }
}
