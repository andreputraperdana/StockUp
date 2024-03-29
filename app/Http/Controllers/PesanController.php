<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    public function getindex(){
        if(auth()->user()->role_id == 2){
            $pesanmasuk = Message::join(DB::raw("(SELECT user_id, destination_id, MAX(created_at) as created FROM messages GROUP BY user_id, destination_id) b"), function($join){
                $join->on('messages.created_at', '=', 'b.created');
            })->join('users', 'users.id', '=', 'messages.user_id')->orderBy('messages.user_id')->select("messages.user_id", "users.name","messages.destination_id", "messages.message","messages.created_at")->where('messages.destination_id', '=', auth()->user()->id)->get();
        }
        else if(auth()->user()->role_id == 1){
            $pesanmasuk = Message::join(DB::raw("(SELECT user_id, destination_id, MAX(created_at) as created FROM messages GROUP BY user_id, destination_id) b"), function($join){
                $join->on('messages.created_at', '=', 'b.created');
            })->join('users', 'users.id', '=', 'messages.destination_id')->orderBy('messages.destination_id')->select("messages.user_id", "users.name","messages.destination_id", "messages.message","messages.created_at")->where('messages.user_id', '=', auth()->user()->id)->get();
        }
        
        return view('allpesanmasuk', ['SemuaPesan'=>$pesanmasuk]);
    }
}
