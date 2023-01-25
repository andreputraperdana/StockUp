<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    public function getindex(){
        $pesanmasuk = Message::join(DB::raw("(SELECT user_id, destination_id, MAX(created_at) as created FROM messages GROUP BY user_id, destination_id) b"), function($join){
            $join->on('messages.created_at', '=', 'b.created');
        })->join('users', 'users.id', '=', 'messages.destination_id')->orderBy('messages.destination_id')->select("messages.user_id", "users.name","messages.destination_id", "messages.message","messages.created_at")->where('messages.user_id', '=', auth()->user()->id)->orWhere('messages.destination_id', '=', auth()->user()->id)->get();
        
        return view('allpesanmasuk', ['SemuaPesan'=>$pesanmasuk]);
    }
}
