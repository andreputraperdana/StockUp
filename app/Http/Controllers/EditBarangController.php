<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiBarangMasuk;
use App\Models\BarangUMKM;
use Illuminate\Support\Facades\DB;

class EditBarangController extends Controller
{
    public function getindex($id)
    {
        $hasil = DB::table('barang_umkm')
            ->join('transaksi_barang_masuk', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')
            ->where('transaksi_barang_masuk.id', '=', $id)->get();
        return view('editbarang', ['hasil' => $hasil]);
    }

    public function update(Request $request)
    {
        $output = $request->input();
        $checkbarang = BarangUMKM::where('nama', $request->namabarang)->first();
        $transaksibarangmasuk = TransaksiBarangMasuk::where('barang_umkm_id', $checkbarang->id)->first();
        $transaksibarangmasuk->barang_umkm_id = $checkbarang->id;
        $transaksibarangmasuk->jumlah = $output['jumlahbarang'];
        $transaksibarangmasuk->harga = $output['hargabarang'];
        $transaksibarangmasuk->tanggal_kadaluarsa = $output['tanggalkadaluarsa'];
        $transaksibarangmasuk->notif_flag = 0;
        $transaksibarangmasuk->update();
        $filenameWithExt = $request->file('fotobarang')->getClientOriginalName();
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $request->file('fotobarang')->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        // Upload Image
        $path = $request->file('fotobarang')->storeAs('public/image', $fileNameToStore);
        $checkbarang->foto_barang = $fileNameToStore;
        $checkbarang->update();

        return redirect('/mengelolabarang')->with('status', 'Data siswa Berhasil Diubah');
    }
}
