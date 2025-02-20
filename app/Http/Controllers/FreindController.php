<?php

namespace App\Http\Controllers;
use App\Models\Freind;
use Illuminate\Support\Facades\Auth;
use App\Events\FriendRequestSent;


use Illuminate\Http\Request;

class FreindController extends Controller
{
    public function index(){
        $authenticatedId = Auth::id();
        $freinds = Freind::join('users','users.id','=','freinds.friend_id')
        ->where('freinds.user_id','=',$authenticatedId)
        ->select('users.id','users.name','users.email','users.pseudo','users.image')
        ->get();

        return view('users.Myfreinds',compact('freinds'));
    }
    public function sendFriendRequest(Request $request)
    {
        $userId = Auth::id(); // Authenticated user
        $friendId = $request->friend_id;

        // Save the friend request in the database
        Freind::create([
            'user_id' => $userId,
            'friend_id' => $friendId,
        ]);

        // Broadcast the event to notify the friend
        broadcast(new FriendRequestSent($userId, $friendId));

        return response()->json(['status' => 'Friend request sent!']);
    }
    public function addFreind(Request $request){
        $freindId = $request->idUser;
        $userId = Auth::id();

        Freind::create([
            'user_id' => $userId,
            'friend_id' => $freindId
        ]);
    }
}
