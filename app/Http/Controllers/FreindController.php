<?php

namespace App\Http\Controllers;
use App\Models\Freind;
use Illuminate\Support\Facades\Auth;
use App\Events\FriendRequestSent;


use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class FreindController extends Controller
{
    // afficher les amis du utilisateur authentifier
    public function index(){
        $authenticatedId = Auth::id();
        $freinds = Freind::join('users','users.id','=','freinds.friend_id')
        ->where('freinds.user_id','=',$authenticatedId)
        ->select('users.id','users.name','users.email','users.pseudo','users.image','freinds.status')
        ->get();

        return view('users.Myfreinds',compact('freinds'));
    }
    public function addFreind(Request $request){
        $freindId = $request->idUser;
        $userId = Auth::id();
        $existingFreind = Freind::where('user_id',$userId)
        ->where('friend_id',$freindId)
        ->orWhere('user_id',$freindId)
        ->where('friend_id',$userId)
        ->exists();
        if($existingFreind){
            if($existingFreind->status = 'done'){
                return redirect()->route('Myfreinds')->with('error','You are already freinds');
            }
            if($existingFreind->status = 'pending'){
                return redirect()->route('Myfreinds')->with('error','A freind request is already pending');
            }
            if($existingFreind->status = 'canceled'){
                return redirect()->route('Myfreinds')->with('error','This friend request was previously rejected.');
            }
        }


        Freind::create([
            'user_id' => $userId,
            'friend_id' => $freindId,
            'status' => 'pending'
        ]);
        Freind::create([
            'user_id' => $freindId,
            'friend_id' => $userId,
            'status' => 'pending'
        ]);

        
        return redirect()->route('Myfreinds')->with('success','freind added successfuly');
    }
    public function acceptFreind(Request $request){
        
    }
}
