<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function getindex()
    {
        $flag = 5;
        $Item = BarangPemasok::all();
        return view('toko', ['flag' => $flag, 'Item' => $Item]);
    }
}
