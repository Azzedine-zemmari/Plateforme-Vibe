<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
{
    $message = Message::create([
        'user_Id' =>Auth::id(),
        'message' => $request->message
    ]);

    broadcast(new MessageSent($message)); // Broadcast the event

    return response()->json($message);
}
}
