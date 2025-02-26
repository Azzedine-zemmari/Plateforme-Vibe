<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Commentaire;


class CommentaireController extends Controller
{
    public function createComment(Request $request) {
        $userId = Auth::id();
        $postId = $request->input('postId');
        $content = $request->input('content');

        $comment = Commentaire::create([
            'content'=>$content,
            'postId'=>$postId,
            'userId'=>$userId,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        return redirect()->route('posts');
    }
}
