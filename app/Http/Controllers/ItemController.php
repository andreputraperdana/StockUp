<?php

namespace App\Http\Controllers;

use App\Models\BarangPemasok;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function getindex($id)
    {
        $BarangDetail = $this->getBarangPemasokByID($id);
        $BarangRandom = $this->getBarangRandom();
        // return redirect()->route('item', ['id' => $id])->with('BarangDetail', $BarangDetail);
        return view('item', ['BarangDetail'=> $BarangDetail, 'BarangRandom'=> $BarangRandom]);
    }

    public function getBarangPemasokByID($id){
        $BarangDetail = BarangPemasok::join('users', 'users.id', '=', 'barang_pemasok.user_id')->where('barang_pemasok.id', '=', $id)->get();
        return $BarangDetail;
    }

    public function getBarangRandom(){
       $BarangRandom =  BarangPemasok::inRandomOrder()->limit(5)->get();
       return $BarangRandom;
    }
}
