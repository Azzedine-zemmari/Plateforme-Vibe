<?php

namespace App\Http\Controllers;
use App\Models\Freind;
use Illuminate\Support\Facades\Auth;
use App\Events\FriendRequestSent;


use Illuminate\Http\Request;

class FreindController extends Controller
{
    // afficher les amis du utilisateur authentifier
    public function index(){
        $authenticatedId = Auth::id();
        $freinds = Freind::join('users','users.id','=','freinds.friend_id')
        ->where('freinds.user_id','=',$authenticatedId)
        ->select('users.id','users.name','users.email','users.pseudo','users.image')
        ->get();

        return view('users.Myfreinds',compact('freinds'));
    }
    public function addFreind(Request $request){
        $freindId = $request->idUser;
        $userId = Auth::id();
        $existingFreind = Freind::where('user_id',$userId)->where('friend_id',$freindId)->first();
        if($existingFreind){
            return redirect()->route('Myfreinds')->with('error','This user is already exists');
        }

        Freind::create([
            'user_id' => $userId,
            'friend_id' => $freindId
        ]);

        
        return redirect()->route('Myfreinds')->with('success','freind added successfuly');
    }
}
