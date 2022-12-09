<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function getindex($id)
    {
        $BarangDetail = BarangPemasok::join('users', 'users.id', '=', 'barang_pemasok.user_id')->where('barang_pemasok.id', '=', $id)->get();
        return view('item', ['BarangDetail' => $BarangDetail]);
    }
}
