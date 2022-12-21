<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DaftarController extends Controller
{
    public function getindex(){
        return view('register');
    }

    public function inputdata(Request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password'=> 'required|min:5',
            'nama' => 'required',
            'kategori' => 'required',
            'nomortelp' => 'required|min:12',
            // 'fotoprofil' => 'image'
        ]);

        if($validate->fails()){
            return response()->json(['stats'=>300, 'error'=>$validate->errors()]);
        }

        else{
            $hasil = $request->input();
            $register = new User;
            $register->email = $hasil['email'];
            $register->password = Hash::make($hasil['password']);
            $register->name = $hasil['nama'];
            $register->kategori = $hasil['kategori'];
            $register->nomortelp = $hasil['nomortelp'];
            $register->role_id = $hasil['roleid'];
            $register->status = "Active";
            $filenameWithExt = $request->file('fotoprofil')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('fotoprofil')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('fotoprofil')->move('public/image', $fileNameToStore);
            $register->foto_profile = $fileNameToStore;
            $register->save();
            
            return response()->json(['stats'=>200]);
        }
    }
}
