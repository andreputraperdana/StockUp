<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function getindex(){
        return view('editprofile');
    }

    public function update(Request $request){
        $output = $request->input();
        $id = Auth()->user()->id;
        $user = User::where('id', $id)->first();
        $passwordLama = $output['password'];
        $passwordBaru = $output['passwordBaru'];
        $passwordKonfirmasi = $output['passwordKonfirmasi'];
        $auth = Auth::user();

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
