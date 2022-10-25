<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlatformSosialController extends Controller
{
    public function getindex(){
        return view('platformsosial');
    }
}
