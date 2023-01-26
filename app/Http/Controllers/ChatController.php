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
    public function getindex($id)
    {
        // $userid = $request->user_id;
        if($id == 0){
            return view('chat', ['id'=>$id]);
        }
        else{
            $userchat = User::where('id', '=', $id)->first();
            return view('chat',  ['userchat' => $userchat, 'id'=>$id]);
            
        }
        // dd($pesanmasuk);
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

}
