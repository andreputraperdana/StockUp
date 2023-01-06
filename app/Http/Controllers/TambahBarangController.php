<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use App\Models\BarangUMKM;
use App\Models\Role;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TambahBarangController extends Controller
{
    public function getindex()
    {
        $flag = 2;
        $BarangEksisting = BarangUMKM::where('user_id', '=', auth()->user()->id)->get();
        return view('tambahbarang', ['flag' => $flag, 'barangexist'=>$BarangEksisting]);
    }

    public function inputbarang(Request $request)
    {
        $checkbarang = BarangUMKM::where('nama', $request->namabarangeksisting)->first();
        $User = $this->CheckUser();
        if ($User == 'UMKM') {
            if (!$checkbarang) {
                $barangUMKM = $this->inputbarangUMKM($request);
                $this->inputbarangMasuk($request, $barangUMKM);
            } else {
                $this->inputbarangMasukExisting($request, $checkbarang);
            }
        } else if ($User == 'Pemasok') {
           $this->inputbarangPemasok($request);
        }
        // return redirect('/tambahbarang');
        return response()->json(['stats' => 200]);
    }

    public function CheckUser(){
        $Check = Role::where('id', '=', auth()->user()->role_id)->first();
        return $Check->name;
    }

    public function inputbarangPemasok($request){
        $output = $request->input();
        $barangPemasok = new BarangPemasok;
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

    public function inputbarangUMKM($request){
        $output = $request->input();
        $barangUMKM = new BarangUMKM;
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
        return $barangUMKM;
    }

    public function inputbarangMasuk($request, $barangUMKM){
        $output = $request->input();
        $transaksibarangmasuk = new TransaksiBarangMasuk;
        $transaksibarangmasuk->barang_umkm_id = $barangUMKM->id;
        $transaksibarangmasuk->jumlah = $output['jumlahbarang'];
        $transaksibarangmasuk->stockawal = $output['jumlahbarang'];
        $transaksibarangmasuk->harga = $output['hargabarang'];
        $transaksibarangmasuk->tanggal_kadaluarsa = $output['tanggalkadaluarsa'];
        $transaksibarangmasuk->notif_flag = 0;
        $transaksibarangmasuk->save();
    }

    public function inputbarangMasukExisting($request, $checkbarang){
        $output = $request->input();
        $transaksibarangmasuk = new TransaksiBarangMasuk;
        $transaksibarangmasuk->barang_umkm_id = $checkbarang->id;
        $transaksibarangmasuk->jumlah = $output['jumlahbarang'];
        $transaksibarangmasuk->stockawal = $output['jumlahbarang'];
        $transaksibarangmasuk->harga = $output['hargabarang'];
        $transaksibarangmasuk->tanggal_kadaluarsa = $output['tanggalkadaluarsa'];
        $transaksibarangmasuk->notif_flag = 0;
        $transaksibarangmasuk->save();
    }

}
