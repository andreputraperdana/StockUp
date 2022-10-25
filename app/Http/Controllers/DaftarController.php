<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    public function getindex(){
        return view('register');
    }

    public function inputdata(Request $request){
        $hasil = $request->input();
        // dd($hasil);
        $register = new User;
        $register->email = $hasil['email'];
        $register->password = Hash::make($hasil['password']);
        $register->name = $hasil['nama'];
        $register->kategori = $hasil['kategori'];
        $register->nomortelp = $hasil['nomortelp'];
        $register->role_id = $hasil['roleid'];
        $register->status = "Active";
        $register->save();

        return response()->json(['stats'=>200, 'errors'=>'Test']);
    }
}
