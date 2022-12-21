<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TokoController extends Controller
{
    public function getindex()
    {
        $flag = 5;
        $Item = BarangPemasok::all();
        $Kategori = BarangPemasok::select('jenis', DB::raw('count(*) as total'))->groupBy('jenis')->get();
        return view('toko', ['flag' => $flag, 'Item' => $Item, 'Kategori' => $Kategori]);
    }
}
