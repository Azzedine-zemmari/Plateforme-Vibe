<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function deleteOldMessage($userId){
        $message = Message::where('user_Id',$userId)->where('created_at','<',Carbon::now()->subDay())->get();

        foreach($message as $m){
            $m->delete();
        }

        return count($message);
    }
}
