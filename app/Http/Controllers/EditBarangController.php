<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use Illuminate\Http\Request;
use App\Models\TransaksiBarangMasuk;
use App\Models\BarangUMKM;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditBarangController extends Controller
{
    public function getindex($id)
    {
        $TotalNotif = 0;
        $auth = Auth::user();
        $user = $this->CheckUser();
        if ($user == 'UMKM') {
            $hasil = $this->GetBarangUMKMByid($id);
        } else {
            $hasil = $this->GetBarangPemasokByid($id);
        }
        $CountBarang = $this->countNotifikasi();
        for ($i = 0; $i < COUNT($CountBarang); $i++) {
            if ($CountBarang[$i]['notif_flag'] == 0) {
                $TotalNotif += 1;
            } else {
                $TotalNotif += 0;
            }
        }
        return view('editbarang', ['hasil' => $hasil, 'Totalnotif' => $TotalNotif]);
    }

    public function countNotifikasi()
    {
        $BarangHabisNotif = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10");
        $AllNotifBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', 'transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->union($BarangHabisNotif)->get();
        return $AllNotifBarang;
    }

    public function EditBarang(Request $request)
    {
        $auth = Auth::user();
        $user = $this->CheckUser();
        if ($user == 'UMKM') {
            $validate = Validator::make($request->all(), [
                'jumlahbarang' => 'required',
                'hargabarang' => 'required',
                'fotobarang' => 'mimes:jpeg,jpg,png,gif|max:10000'
            ]);
            if ($validate->fails()) {
                if ($validate->errors()->first('fotobarang')) {
                    return response()->json(['stats' => 400, 'error' => $validate->errors(), 'fotobarang' => $validate->errors()->first('fotobarang')]);
                } else {
                    return response()->json(['stats' => 300, 'error' => $validate->errors()]);
                }
            } 
            else{
                $this->EditBarangUMKM($request);
                return response()->json(['stats' => 200]);
            }
        } else {
            $validate = Validator::make($request->all(), [
                'deskripsi' => 'required',
                'hargabarang' => 'required',
                'fotobarang' => 'mimes:jpeg,jpg,png,gif|max:10000'
            ]);
            if ($validate->fails()) {
                if ($validate->errors()->first('fotobarang')) {
                    return response()->json(['stats' => 450, 'error' => $validate->errors(), 'fotobarang' => $validate->errors()->first('fotobarang')]);
                } else {
                    return response()->json(['stats' => 350, 'error' => $validate->errors()]);
                }
            }else{
                $this->EditBarangPemasok($request);
                return response()->json(['stats' => 200]);
            }
        }
    
    }

    public function CheckUser()
    {
        $Check = Role::where('id', '=', auth()->user()->role_id)->first();
        return $Check->name;
    }

    public function GetBarangUMKMByid($id)
    {
        $getbarangumkm =  $hasil = DB::table('barang_umkm')
            ->join('transaksi_barang_masuk', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')
            ->where('transaksi_barang_masuk.id', '=', $id)->get();
        return $getbarangumkm;
    }

    public function GetBarangPemasokByid($id)
    {
        $getbarangpemasok = DB::table('barang_pemasok')->where('id', '=', $id)->get();
        return $getbarangpemasok;
    }

    public function EditBarangUMKM($request)
    {
        $output = $request->input();
        // dd($output['idbarang']);
        $checkbarang = BarangUMKM::where('id', $output['idbarang'])->first();
        $transaksibarangmasuk = TransaksiBarangMasuk::where('barang_umkm_id', $checkbarang->id)->first();
        $transaksibarangmasuk->barang_umkm_id = $checkbarang->id;
        $transaksibarangmasuk->jumlah = $output['jumlahbarang'];
        $transaksibarangmasuk->harga = $output['hargabarang'];
        $transaksibarangmasuk->tanggal_kadaluarsa = $output['tanggalkadaluarsa'];
        $transaksibarangmasuk->notif_flag = 0;
        $transaksibarangmasuk->update();
        if ($request->file('fotobarang') != null) {
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
    }

    public function EditBarangPemasok($request)
    {
        $output = $request->input();
        $checkbarang = BarangPemasok::where('id', $request->idbarang)->first();
        $checkbarang->nama = $output['namabarang'];
        $checkbarang->jenis = $output['kategori'];
        $checkbarang->harga = $output['hargabarang'];
        $checkbarang->deskripsi = $output['deskripsi'];
        if ($request->file('fotobarang') != null) {
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
}
