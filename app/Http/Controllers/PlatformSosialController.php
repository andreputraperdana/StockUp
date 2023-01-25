<?php

namespace App\Http\Controllers;

use App\Models\PlatformSosial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlatformSosialController extends Controller
{
    public function getindex($id)
    {
        $PlatformSosial = $this->getPlatformSosial($id);
        return view('platformsosial', ['PlatformSosial' => $PlatformSosial]);
    }

    public function getPlatformSosial($id)
    {
        $Sosial = PlatformSosial::join('users', 'users.id', '=', 'platform_sosial.user_id')->where('platform_sosial.user_id', '=', $id)->get();
        return $Sosial;
    }
}
