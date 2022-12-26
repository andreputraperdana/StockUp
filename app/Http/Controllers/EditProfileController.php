<?php

namespace App\Http\Controllers;

use App\Models\PlatformSosial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function getindex(){
        $id = Auth()->user()->id;
        $platformIg = PlatformSosial::where(['user_id' => $id, 'nama' => 'Instagram'])->get();
        $platformShope = PlatformSosial::where(['user_id' => $id, 'nama' => 'Shopee'])->get();
        $platformTokped = PlatformSosial::where(['user_id' => $id, 'nama' => 'Tokopedia'])->get();
        return view('editprofile', ['platformIg' => $platformIg, 'platformShope' => $platformShope, 'platformTokped'=> $platformTokped]);
    }

    public function update(Request $request){
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
        $auth = Auth::user();

        if($auth->role_id == 2){
            $passwordKonfirmasi = $output['passwordKonfirmasi'];
            $platformInstagram = $output['platform_instagram'];
            $platformShopee = $output['platform_shopee'];
            $platformTokopedia = $output['platform_tokopedia'];
            if($platformInstagram != "" || $platformInstagram != null){
                if(!$platformIg->isEmpty()){
                    $platIg->user_id = $id;
                    $platIg->nama = "Instagram";
                    $platIg->link = $platformInstagram;
                    $platIg->update();
                }else{
                    $platformSosial->user_id = $id;
                    $platformSosial->nama = "Instagram";
                    $platformSosial->link = $platformInstagram;
                    $platformSosial->save();
                }
            }
            if($platformShopee != "" || $platformShopee != null){
                if(!$platformShope->isEmpty()){
                    $platShope->user_id = $id;
                    $platShope->nama = "Shopee";
                    $platShope->link = $platformShopee;
                    $platShope->update();
                }else{
                    $platformSosial->user_id = $id;
                    $platformSosial->nama = "Shopee";
                    $platformSosial->link = $platformShopee;
                    $platformSosial->save();
                }
            }
            if($platformTokopedia != "" || $platformTokopedia != null){
                if(!$platformTokped->isEmpty()){
                    $platTokped->user_id = $id;
                    $platTokped->nama = "Tokopedia";
                    $platTokped->link = $platformTokopedia;
                    $platTokped->update();
                }else{
                    $platformSosial->user_id = $id;
                    $platformSosial->nama = "Tokopedia";
                    $platformSosial->link = $platformTokopedia;
                    $platformSosial->save();
                }
            }
        }

        if(($passwordLama == "" || $passwordLama == null) && ($passwordBaru == "" || $passwordBaru == null) && ($passwordKonfirmasi == "" || $passwordKonfirmasi == null)){
            $user->name = $output['nama'];
            $user->kategori = $output['kategori'];
            $user->nomortelp = $output['nomorTelp'];
            $user->password = $auth->password;
            $user->update();
            return back()->with('success', 'Data Berhasil Dirubah');
        }
        if(!Hash::check($output['password'], $auth->password)){
            return back()->with('error', 'Password Lama anda salah');
        }else if($passwordBaru != $passwordKonfirmasi){
            return back()->with('error', 'Password Konfirmasi tidak sesuai dengan password baru');
        }
        $user->email = $output['email'];
        $user->name = $output['nama'];
        $user->kategori = $output['kategori'];
        $user->nomortelp = $output['nomorTelp'];
        $user->password = Hash::make($output['passwordKonfirmasi']);
        $user->update();

        return redirect('/')->with('success', 'Data Berhasil Dirubah');
    }
}
