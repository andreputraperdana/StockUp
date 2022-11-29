<?php

namespace App\Http\Controllers;

use App\Models\BarangUMKM;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Http\Request;

class TambahBarangController extends Controller
{
    public function getindex(){
        $flag = 2;
        return view('tambahbarang', ['flag'=>$flag]);
    }

    public function inputbarang(Request $request){
        $output = $request->input();
        $barangUMKM = new BarangUMKM;
        $transaksibarangmasuk = new TransaksiBarangMasuk;
        $checkbarang = BarangUMKM::where('nama', $request->namabarang)->first();
        if(!$checkbarang){
            $barangUMKM->user_id = auth()->user()->id;
            $barangUMKM->nama = $output['namabarang'];
            $barangUMKM->jenis = $output['jenisbarang'];
            $barangUMKM->foto_barang = $output['fotobarang'];
            $barangUMKM->save(); 
            $transaksibarangmasuk->barang_umkm_id = $barangUMKM->id;
            $transaksibarangmasuk->jumlah = $output['jumlahbarang'];
            $transaksibarangmasuk->harga = $output['hargabarang'];
            $transaksibarangmasuk->tanggal_kadaluarsa = $output['tanggalkadaluarsa'];
            $transaksibarangmasuk->notif_flag = 0;
            $transaksibarangmasuk->save();
        }
        else{
            $transaksibarangmasuk->barang_umkm_id = $checkbarang->id;
            $transaksibarangmasuk->jumlah = $output['jumlahbarang'];
            $transaksibarangmasuk->harga = $output['hargabarang'];
            $transaksibarangmasuk->tanggal_kadaluarsa = $output['tanggalkadaluarsa'];
            $transaksibarangmasuk->notif_flag = 0;
            $transaksibarangmasuk->save();
        }

        // return redirect('/tambahbarang');
        return response()->json(['stats'=>200, 'errors'=>'Test']);
    }
}
