<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get(); // Fetch all messages
        return view('chat', ['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        // Validate the request (only the message is needed now)
        $request->validate([
            'message' => 'required|string',
        ]);

        // Get the authenticated user's ID
        $user_Id = Auth::id();

        // Create and save the message
        $message = Message::create([
            'user_Id' => $user_Id, // Use the authenticated user's ID
            'message' => $request->input('message'),
        ]);

        // Broadcast the event
        broadcast(new MessageSent($message->user_Id, $message->message))->toOthers();

        return response()->json(['status' => 'Message sent!']);
    }

    public function getMessages()
    {
        // Fetch messages with user details
        return Message::with('user')->get();
    }

}
