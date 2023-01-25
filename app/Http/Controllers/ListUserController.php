<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListUserController extends Controller
{
    public function getindex()
    {
        $ListUser = User::where('role_id', '=', '2')->get();
        return view('listuser', ['ListUser' => $ListUser]);
    }
}
