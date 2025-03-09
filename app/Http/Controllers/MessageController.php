<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\NewMessage;

class MessageController extends Controller
{

    public function deleteOldMessage($userId){
        $message = Message::where('user_Id',$userId)->where('created_at','<',Carbon::now()->subDay())->get();

        foreach($message as $m){
            $m->delete();
        }

        return count($message);
    }

    public function deleteOldMessages()
    {
        $users = User::where('auto_delete_messages', true)->get();
        
        foreach ($users as $user) {
            $daysToKeep = $user->delete_messages_after_days;
            
            Message::where('from_id', $user->id)
                ->where('created_at', '<', now()->subDays($daysToKeep))
                ->delete();
        }
    }

    public function store(Request $request)
    {
        $message = Message::create([
            'from_id' => auth()->id(),
            'to_id' => $request->recipient_id,
            'message' => $request->message,
        ]);

        event(new NewMessage($message, $request->recipient_id));

        return response()->json(['status' => 'success']);
    }
}
