<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getindex(Request $request){
        $userid = $request->user_id;
        $userchat = User::where('id', '=', $userid)->first();
        return view('chat',  ['userchat' => $userchat]);
    }
}
