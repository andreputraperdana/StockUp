<?php

namespace App\Http\Controllers;

use App\Models\PlatformSosial;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TransaksiBarangMasuk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EditProfileController extends Controller
{
    public function getindex()
    {
        $TotalNotif = 0;
        $id = Auth()->user()->id;
        $platformIg = PlatformSosial::where(['user_id' => $id, 'nama' => 'Instagram'])->get();
        $platformShope = PlatformSosial::where(['user_id' => $id, 'nama' => 'Shopee'])->get();
        $platformTokped = PlatformSosial::where(['user_id' => $id, 'nama' => 'Tokopedia'])->get();
        $CountBarang = $this->countNotifikasi();
        for ($i = 0; $i < COUNT($CountBarang); $i++) {
            if ($CountBarang[$i]['notif_flag'] == 0) {
                $TotalNotif += 1;
            } else {
                $TotalNotif += 0;
            }
        }
        return view('editprofile', ['platformIg' => $platformIg, 'platformShope' => $platformShope, 'platformTokped' => $platformTokped, 'Totalnotif' => $TotalNotif]);
    }

    public function countNotifikasi()
    {
        $BarangHabisNotif = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', DB::raw('1 as id, CURDATE() as Date_Today, SUM(jumlah) as Total, 2 as jumlah, "" as tanggal_kadaluarsa'))->where('user_id', '=', auth()->user()->id)->groupBy('barang_umkm_id')->havingRaw("SUM(jumlah) < 10");
        $AllNotifBarang = TransaksiBarangMasuk::join('barang_umkm', 'barang_umkm.id', '=', 'transaksi_barang_masuk.barang_umkm_id')->select('barang_umkm_id', 'transaksi_barang_masuk.id', DB::raw('CURDATE() as Date_Today, "" as Total'), 'jumlah', 'tanggal_kadaluarsa')->whereRaw(DB::raw('((CURDATE() BETWEEN DATE_ADD(tanggal_kadaluarsa, INTERVAL -14 DAY) AND tanggal_kadaluarsa) or (CURDATE() > tanggal_kadaluarsa))'))->where('user_id', '=', auth()->user()->id)->where('jumlah','!=', 0)->union($BarangHabisNotif)->get();
        return $AllNotifBarang;
    }

    public function update(Request $request)
    {
        $output = $request->input();
        $id = Auth()->user()->id;
        $user = User::where('id', $id)->first();
        $platIg = PlatformSosial::where(['user_id' => $id, 'nama' => 'Instagram'])->first();
        $platShope = PlatformSosial::where(['user_id' => $id, 'nama' => 'Shopee'])->first();
        $platTokped = PlatformSosial::where(['user_id' => $id, 'nama' => 'Tokopedia'])->first();
        $platformIg = PlatformSosial::where(['user_id' => $id, 'nama' => 'Instagram'])->get();
        $platformShope = PlatformSosial::where(['user_id' => $id, 'nama' => 'Shopee'])->get();
        $platformTokped = PlatformSosial::where(['user_id' => $id, 'nama' => 'Tokopedia'])->get();
        $platformSosial = new PlatformSosial;
        $passwordLama = $output['password'];
        $passwordBaru = $output['passwordBaru'];
        $passwordKonfirmasi = $output['passwordKonfirmasi'];
        $nomortelp = $output['nomorTelp'];
        $auth = Auth::user();
        $Users = $this->CheckUser();

        if ($Users == 'Pemasok') {
            $this->InsertPlatformSosial($output, $id);
        }

        if (($passwordLama == "" || $passwordLama == null) && ($passwordBaru == "" || $passwordBaru == null) && ($passwordKonfirmasi == "" || $passwordKonfirmasi == null)) {
            $user->name = $output['nama'];
            $user->kategori = $output['kategori'];
            $user->nomortelp = $output['nomorTelp'];
            if($user->nomortelp == "" || $user->nomortelp == null){
                return back()->with('error', 'Nomor Telfon Tidak Boleh Kosong');
            }else if($user->name == "" || $user->name == null){
                return back()->with('error', 'Nama Tidak Boleh Kosong');
            }
            $user->password = $auth->password;
            if ($request->file('fotoprofile') != null) {
                $filenameWithExt = $request->file('fotoprofile')->getClientOriginalName();
                // Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just Extension
                $extension = $request->file('fotoprofile')->getClientOriginalExtension();
                // Filename To store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $request->file('fotoprofile')->move('public/image', $fileNameToStore);
                $user->foto_profile = $fileNameToStore;
            }
            $user->update();
            return back();
        }
        if (!Hash::check($output['password'], $auth->password)) {
            return back()->with('error', 'Password Lama anda salah');
        } else if ($passwordBaru != $passwordKonfirmasi) {
            return back()->with('error', 'Password Konfirmasi tidak sesuai dengan password baru');
        }
        $this->UpdateProfile($user, $output);

        return redirect('/')->with('success', 'Data Berhasil Diubah');
    }

    public function CheckUser()
    {
        $Check = Role::where('id', '=', auth()->user()->role_id)->first();
        return $Check->name;
    }

    public function UpdateProfile($user, $output)
    {
        $user->email = $output['email'];
        $user->name = $output['nama'];
        $user->kategori = $output['kategori'];
        $user->nomortelp = $output['nomorTelp'];
        $user->password = Hash::make($output['passwordKonfirmasi']);
        $user->update();
    }

    public function InsertPlatformSosial($output, $id)
    {
        $platIg = PlatformSosial::where(['user_id' => $id, 'nama' => 'Instagram'])->first();
        $platShope = PlatformSosial::where(['user_id' => $id, 'nama' => 'Shopee'])->first();
        $platTokped = PlatformSosial::where(['user_id' => $id, 'nama' => 'Tokopedia'])->first();
        $platformIg = PlatformSosial::where(['user_id' => $id, 'nama' => 'Instagram'])->get();
        $platformShope = PlatformSosial::where(['user_id' => $id, 'nama' => 'Shopee'])->get();
        $platformTokped = PlatformSosial::where(['user_id' => $id, 'nama' => 'Tokopedia'])->get();
        $passwordKonfirmasi = $output['passwordKonfirmasi'];
        $platformInstagram = $output['platform_instagram'];
        $platformShopee = $output['platform_shopee'];
        $platformTokopedia = $output['platform_tokopedia'];
        if ($platformInstagram != "" || $platformInstagram != null) {
            if (!$platformIg->isEmpty()) {
                $platIg->user_id = $id;
                $platIg->nama = "Instagram";
                $platIg->link = $platformInstagram;
                $platIg->update();
            } else {
                // $platformSosial->user_id = $id;
                // $platformSosial->nama = "Instagram";
                // $platformSosial->link = $platformInstagram;
                $platformSosial = [
                    ['user_id' => $id, 'nama' => "Instagram", 'link' => $platformInstagram],
                ];
                PlatformSosial::insert($platformSosial);
            }
        }
        if ($platformShopee != "" || $platformShopee != null) {
            if (!$platformShope->isEmpty()) {
                $platShope->user_id = $id;
                $platShope->nama = "Shopee";
                $platShope->link = $platformShopee;
                $platShope->update();
            } else {
                // $platformSosial->user_id = $id;
                // $platformSosial->nama = "Shopee";
                // $platformSosial->link = $platformShopee;
                $platformSosial = [
                    ['user_id' => $id, 'nama' => "Shopee", 'link' => $platformShopee],
                ];

                PlatformSosial::insert($platformSosial);
            }
        }
        if ($platformTokopedia != "" || $platformTokopedia != null) {
            if (!$platformTokped->isEmpty()) {
                $platTokped->user_id = $id;
                $platTokped->nama = "Tokopedia";
                $platTokped->link = $platformTokopedia;
                $platTokped->update();
            } else {
                // $platformSosial->user_id = $id;
                // $platformSosial->nama = "Tokopedia";
                // $platformSosial->link = $platformTokopedia;
                $platformSosial = [
                    ['user_id' => $id, 'nama' => "Tokopedia", 'link' => $platformTokopedia],
                ];
                PlatformSosial::insert($platformSosial);
            }
        }
    }
}
