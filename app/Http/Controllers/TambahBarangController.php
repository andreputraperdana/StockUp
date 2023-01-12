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
        $User = $this->CheckUser();

        if($User == 'UMKM'){
            $hasilinput = $request->input();
            if($hasilinput['jenisAllbarang'] == 'Barang Baru'){
                $validate = Validator::make($request->all(), [
                    'namabarang' => 'required',
                    'jenisbarang'=> 'required',
                    'jumlahbarang' => 'required',
                    'hargabarang' => 'required',
                    'fotobarang' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
                ]);
                if($validate->fails()){
                    if($validate->errors()->first('fotobarang')){
                        return response()->json(['stats'=>400, 'error'=>$validate->errors(), 'fotobarang'=> $validate->errors()->first('fotobarang')]);
                    }
                    else{
                        return response()->json(['stats'=>300, 'error'=>$validate->errors()]);
                    }
                }else{
                        $barangUMKM = $this->inputbarangUMKM($request);
                        $this->inputbarangMasuk($request, $barangUMKM);
                        return response()->json(['stats' => 200]);
                }
            }
            else if($hasilinput['jenisAllbarang'] == 'Barang Existing'){
                $validates = Validator::make($request->all(), [
                    'namabarangeksisting' => 'required',
                    'jumlahbarang' => 'required',
                    'hargabarang' => 'required',
                ]);
                if($validates->fails()){
                    return response()->json(['stats'=>100, 'error'=>$validates->errors()]);
                }
                else{
                    $checkbarang = BarangUMKM::where('nama', '=', $hasilinput['namabarangeksisting'])->first();
                    $this->inputbarangMasukExisting($request, $checkbarang);
                    return response()->json(['stats' => 200]);
                }
            }
        }
        else if ($User == 'Pemasok') {
            $validate = Validator::make($request->all(), [
                'namabarang' => 'required',
                'jenisbarang'=> 'required',
                'hargabarang' => 'required',
                'deskripsi' => 'required',
                'fotobarang' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            ]);
            if($validate->fails()){
                if($validate->errors()->first('fotobarang')){
                    return response()->json(['stats'=>400, 'error'=>$validate->errors(), 'fotobarang'=> $validate->errors()->first('fotobarang')]);
                }
                else{
                    return response()->json(['stats'=>300, 'error'=>$validate->errors()]);
                }
            }else{
                $this->inputbarangPemasok($request);
            }
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
        $transaksibarangmasuk->stockawal =$output['jumlahbarang'];
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
