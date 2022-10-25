<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function getindex(){
        $flag = 3;
        return view('laporan', ['flag'=>$flag]);
    }
}