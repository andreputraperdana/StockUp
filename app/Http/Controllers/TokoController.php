<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TokoController extends Controller
{
    public function getindex()
    {
        $filterTanggal = request('filterTanggal');
        $flag = 5;
        $Item = BarangPemasok::paginate(12);
        $Kategori = BarangPemasok::select('jenis', DB::raw('count(*) as total'))->groupBy('jenis')->get();
        return view('toko', ['flag' => $flag, 'Item' => $Item, 'Kategori' => $Kategori]);
    }

    public function getDataByKategori($jenis)
    {
        $flag = 5;
        $Item = BarangPemasok::where('jenis', '=', $jenis)->paginate(12);
        $Kategori = BarangPemasok::select('jenis', DB::raw('count(*) as total'))->groupBy('jenis')->get();
        return view('toko', ['flag' => $flag, 'Item' => $Item, 'Kategori' => $Kategori]);
    }
}
