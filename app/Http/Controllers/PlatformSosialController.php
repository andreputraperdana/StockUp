<?php

namespace App\Http\Controllers;

use App\Models\PlatformSosial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlatformSosialController extends Controller
{
    public function getindex($id){
        $PlatformSosial = PlatformSosial::join('users', 'users.id', '=', 'platform_sosial.user_id')->where('platform_sosial.user_id', '=', $id)->get();
        return view('platformsosial', ['PlatformSosial'=> $PlatformSosial]);
    }
}
