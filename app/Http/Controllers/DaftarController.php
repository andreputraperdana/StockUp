<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DaftarController extends Controller
{
    public function getindex()
    {
        return view('register');
    }

    public function inputdata(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'nama' => 'required',
            'kategori' => 'required',
            'nomortelepon' => 'required|min:12',
            'fotoprofil' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        // dd($validate->errors()->first('email'));

        if ($validate->fails()) {
            if ($validate->errors()->first('fotoprofil')) {
                return response()->json(['stats' => 400, 'error' => $validate->errors(), 'fotoprofil' => $validate->errors()->first('fotoprofil')]);
            } else {
                return response()->json(['stats' => 300, 'error' => $validate->errors()]);
            }
        } else {
            $this->adduser($request);
            return response()->json(['stats' => 200]);
        }
    }

    public function adduser($request)
    {
        $hasil = $request->input();
        $register = new User;
        $register->email = $hasil['email'];
        $register->password = Hash::make($hasil['password']);
        $register->name = $hasil['nama'];
        $register->kategori = $hasil['kategori'];
        $register->nomortelp = $hasil['nomortelepon'];
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
    }
}
