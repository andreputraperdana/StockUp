<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function getindex(){
        $flag = 5;
        return view('toko', ['flag'=>$flag]);
    }
}