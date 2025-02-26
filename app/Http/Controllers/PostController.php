<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function insertForm()
    {
        return view('posts.postForm');
    }
    public function addPost(Request $request)
    {
        $content =  $request->input('content');
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $request->file('post_image')->storeAs('postPicture', $imageName, 'public');
        }
        else{
            $imagePath = null;
        }

        DB::table('posts')->insert(['content'=>$content,'image'=>$imagePath,'created_at'=>now(),'updated_at'=>now(),'userId'=>Auth::id()]);

        // Fetch the posts and authenticated user after inserting a post
        $posts = DB::table('posts')
        ->join('users','users.id','=','posts.userId')
        ->leftJoin('likes','likes.postId','=','posts.id')
        ->select('users.name',
        'users.image',
        'posts.content',
        'posts.image as IMAGE',
        'posts.id',
        DB::raw('COUNT(likes.id) as likes_count')
        )
        ->groupBy('posts.id', 'users.name', 'users.image', 'posts.content', 'IMAGE') 
        ->orderByDesc('posts.created_at')
        ->get();

        $authenticatedUser = Auth::user();


        return view('posts.index',compact('authenticatedUser','posts'));

    }

    public function showPosts(){
        $posts = DB::table('posts')
        ->join('users','users.id','=','posts.userId')
        ->leftJoin('likes','likes.postId','=','posts.id')
        ->select('users.name',
        'users.image',
        'posts.content',
        'posts.image as IMAGE',
        'posts.id',
        DB::raw('COUNT(likes.id) as likes_count')
        )
        ->groupBy('posts.id', 'users.name', 'users.image', 'posts.content', 'IMAGE') 
        ->orderByDesc('posts.created_at')
        ->get();

        $authenticatedUser = Auth::user();

        return view('posts.index',compact('posts','authenticatedUser'));
    }

}
