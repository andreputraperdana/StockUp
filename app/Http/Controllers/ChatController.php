<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function getindex(Request $request)
    {
        $userid = $request->user_id;
        $userchat = User::where('id', '=', $userid)->first();
        $pesanmasuk = Message::join(DB::raw("(SELECT user_id, destination_id, MAX(created_at) as created FROM messages GROUP BY user_id, destination_id) b"), function($join){
            $join->on('messages.created_at', '=', 'b.created');
        })->join('users', 'users.id', '=', 'messages.destination_id')->orderBy('messages.destination_id')->select("messages.user_id", "users.name","messages.destination_id", "messages.message","messages.created_at")->where('messages.user_id', '=', auth()->user()->id)->orWhere('messages.destination_id', '=', auth()->user()->id)->get();
        // dd($pesanmasuk);
        return view('chat',  ['userchat' => $userchat]);
    }

    public function CheckUser()
    {
        $Check = Role::where('id', '=', auth()->user()->role_id)->first();
        return $Check->name;
    }

    public function postmessage(Request $request){
        $NewMessage = new Message();
        $NewMessage->user_id = auth()->user()->id;
        $NewMessage->message = $request->message;
        $NewMessage->destination_id = $request->destinationid;
        $NewMessage->save();

        return response()->json(['stats'=>200]);
    }

    public function getAllMessages(Request $request){
        $UMKMID = $request->umkm;
        $PemasokID = $request->pemasok;

        $AllMessages = Message::where('user_id', '=', $UMKMID)->where('destination_id', '=', $PemasokID)->orderBy('created_at', 'ASC')->get();

        return view('allmessages', ['allmessages'=>$AllMessages, 'UMKMID'=> $UMKMID, 'PemasokID'=>$PemasokID]);
    }
}
