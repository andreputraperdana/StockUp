<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AllPesanController extends Controller
{
    public function getAllMessages(Request $request){
        $UMKMID = $request->umkm;
        $PemasokID = $request->pemasok;

        $AllMessages = Message::where('user_id', '=', $UMKMID)->where('destination_id', '=', $PemasokID)->orderBy('created_at', 'ASC')->get();

        return view('allmessages', ['allmessages'=>$AllMessages, 'UMKMID'=> $UMKMID, 'PemasokID'=>$PemasokID]);
    }
}
