<?php

namespace App\Http\Controllers;

use App\Models\Like;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LikeController extends Controller
{
    public function addLike(Request $request){
        $postId = $request->input('postId');
        $userId = Auth::id();

        //  check if like already exists

        $existingLike = Like::where('userId',$userId)->where('postId',$postId)->first();

        if($existingLike){
            return redirect()->route('posts')->with('error','you already like this post');
        }

        Like::create([
            'postId'=>$postId,
            'userId'=>$userId
        ]);

        return redirect()->route('posts');

    }
}
