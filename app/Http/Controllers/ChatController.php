<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getindex(Request $request){
        $userid = $request->user_id;
        $userchat = User::where('id', '=', $userid)->first();
        return view('chat',  ['userchat' => $userchat]);
    }

    public function CheckUser(){
        $Check = Role::where('id', '=', auth()->user()->role_id)->first();
        return $Check->name;
    }

    public function postmessage(Request $request){
        $NewMessage = new Message();
        $NewMessage->user_id = auth()->user()->id;
        $NewMessage->message = $request->message;
        $NewMessage->save();

        return response()->json(['stats'=>200]);
    }

    public function getAllMessages(Request $request){
        $UMKMID = $request->umkm;
        $PemasokID = $request->pemasok;

        $AllMessages = Message::where('user_id', '=', $UMKMID)->orWhere('user_id', '=', $PemasokID)->orderBy('created_at', 'ASC')->get();

        return view('allmessages', ['allmessages'=>$AllMessages]);
    }
}
