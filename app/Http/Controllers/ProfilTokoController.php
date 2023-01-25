<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangPemasok;
use App\Models\User;

class ProfilTokoController extends Controller
{
    public function getindex($id)
    {
        //  $Toko = User::join('barang_pemasok', 'barang_pemasok.user_id', '=', 'users.id')->where('users.id', '=', $id)->get();
        $Toko = $this->GetDataUserPemasok($id);
        $barangpemasok = $this->getDataBarangPemasok($id);
        return view('profiltoko', ['Toko' => $Toko, 'barangpemasok' => $barangpemasok]);
    }

    public function GetDataUserPemasok($id)
    {
        $getdatapemasok = User::where('users.id', '=', $id)->get();
        return $getdatapemasok;
    }

    public function getDataBarangPemasok($userid)
    {
        $barangpemasok = BarangPemasok::where('user_id', '=', $userid)->get();
        return $barangpemasok;
    }
}
