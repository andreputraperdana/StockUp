<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use App\Models\BarangUMKM;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TambahBarangController extends Controller
{
    public function getindex()
    {
        $flag = 2;
        return view('tambahbarang', ['flag' => $flag]);
    }

    public function inputbarang(Request $request)
    {
        $output = $request->input();
        $barangUMKM = new BarangUMKM;
        $barangPemasok = new BarangPemasok;
        $transaksibarangmasuk = new TransaksiBarangMasuk;
        $checkbarang = BarangUMKM::where('nama', $request->namabarang)->first();

        if (Auth::user()->role_id == 1) {
            if (!$checkbarang) {
                $barangUMKM->user_id = auth()->user()->id;
                $barangUMKM->nama = $output['namabarang'];
                $barangUMKM->jenis = $output['jenisbarang'];
                // $barangUMKM->foto_barang = $output['fotobarang'];
                $filenameWithExt = $request->file('fotobarang')->getClientOriginalName();
                // Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just Extension
                $extension = $request->file('fotobarang')->getClientOriginalExtension();
                // Filename To store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $request->file('fotobarang')->move('public/image', $fileNameToStore);
                $barangUMKM->foto_barang = $fileNameToStore;
                $barangUMKM->save();
                $transaksibarangmasuk->barang_umkm_id = $barangUMKM->id;
                $transaksibarangmasuk->jumlah = $output['jumlahbarang'];
                $transaksibarangmasuk->harga = $output['hargabarang'];
                $transaksibarangmasuk->tanggal_kadaluarsa = $output['tanggalkadaluarsa'];
                $transaksibarangmasuk->notif_flag = 0;
                $transaksibarangmasuk->save();
            } else {
                $transaksibarangmasuk->barang_umkm_id = $checkbarang->id;
                $transaksibarangmasuk->jumlah = $output['jumlahbarang'];
                $transaksibarangmasuk->harga = $output['hargabarang'];
                $transaksibarangmasuk->tanggal_kadaluarsa = $output['tanggalkadaluarsa'];
                $transaksibarangmasuk->notif_flag = 0;
                $transaksibarangmasuk->save();
            }
        } else if (Auth::user()->role_id == 2) {
            $barangPemasok->user_id = auth()->user()->id;
            $barangPemasok->nama = $output['namabarang'];
            $barangPemasok->jenis = $output['jenisbarang'];
            $barangPemasok->harga = $output['hargabarang'];
            $barangPemasok->deskripsi = $output['deskripsi'];
            $filenameWithExt = $request->file('fotobarang')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('fotobarang')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('fotobarang')->move('public/image', $fileNameToStore);
            $barangPemasok->foto_barang = $fileNameToStore;
            $barangPemasok->save();
        }
        // return redirect('/tambahbarang');
        return response()->json(['stats' => 200]);
    }
}
