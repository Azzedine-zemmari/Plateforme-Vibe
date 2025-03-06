<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function activate($id)
    {
        $message = Message::findOrFail($id);

        if (!$message->is_active) {
            $message->update(['is_active' => true]);

            \Artisan::call('messages:delete-old');

            return response()->json(['success' => true, 'message' => 'تم تفعيل الرسالة وستتم إزالتها بعد 24 ساعة']);
        }

        return response()->json(['success' => false, 'message' => 'الرسالة مفعلة من قبل']);
    }
    public function deleteOldMessage($userId){
        $message = Message::where('user_Id',$userId)->where('created_at','<',Carbon::now()->subDay())->get();

        foreach($message as $m){
            $m->delete();
        }

        return count($message);
    }
}
