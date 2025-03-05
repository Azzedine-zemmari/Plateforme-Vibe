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
        ->select('users.id','users.name','users.email','users.pseudo','users.image','freinds.status','users.is_online')
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
        ->first();
        if($existingFreind){
            if($existingFreind->status == 'done'){
                return redirect()->route('Myfreinds')->with('error','You are already freinds');
            }
            if($existingFreind->status == 'pending'){
                return redirect()->route('Myfreinds')->with('error','A freind request is already pending');
            }
            if($existingFreind->status == 'canceled'){
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
        $userId = Auth::id();
        $freindId = $request->input('freindId');

        $freindRequest = Freind::where('user_id',$userId)
        ->where('friend_id',$freindId)
        ->where('status','pending')
        ->first();

        if(!$freindRequest){
            return redirect()->route('Myfreinds')->with('error','This friend request is either not found or has already been processed.');
        }
        $freindRequest->status = 'done';
        $freindRequest->save();

        $reverseRequest = Freind::where('user_id',$freindId)->where('friend_id',$userId)->where('status','pending')->first();

        if($reverseRequest){
            $reverseRequest->status = 'done';
            $reverseRequest->save();
        }

        return redirect()->route('Myfreinds')->with('success', 'Friend request accepted successfully.');
    }
    public function refuseFreind(Request $request){
        $userId = Auth::id();
        $freindId = $request->input('freindId');

        $freindRequest = Freind::where('user_id',$userId)->where('friend_id',$freindId)->where('status','pending')->first();

        if(!$freindRequest){
            return redirect()->route('Myfreinds')->with('error','This friend request is either not found or has already been processed.');
        }

        $freindRequest->status = 'canceled';
        $freindRequest->save();

    //    reverse for the freindId incase he is the authenticated user he need to see that the other freind canceld

        $reverserRequest = Freind::where('user_id',$freindId)->where('friend_id',$userId)->where('status','pending')->first();

        if($reverserRequest){
            $reverserRequest->status = 'canceled';
            $reverserRequest->save();
        }
        return redirect()->route('Myfreinds');
    }
}
