<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        ->leftJoin('commentaires','commentaires.postId','=','posts.id')
        ->select('users.name',
        'users.image',
        'posts.content',
        'posts.image as IMAGE',
        'posts.id',
        DB::raw('COUNT(likes.id) as likes_count'),
        DB::raw('COUNT(commentaires.id) as comment_like')
        )
        ->groupBy('posts.id', 'users.name', 'users.image', 'posts.content', 'IMAGE') 
        ->orderByDesc('posts.created_at')
        ->get();

        // For each post, get the actual comments

        foreach($posts as $post){
            $post->comments = DB::table('commentaires')
            ->join('users','users.id','=','commentaires.userId')
            ->where('commentaires.postId',$post->id)
            ->select('users.name as user_name','commentaires.content','users.image as userImage')
            ->get();
        }

        $authenticatedUser = Auth::user();

        return view('posts.index',compact('posts','authenticatedUser'));
    }

    public function EditPost(Request $request){
        $postId = $request->input('postId');

        $post = Post::find($postId);

        if($post){
            return view('posts.postForm',compact('post'));
        }
        else{
            http_response_code(404);
        }

    }
}
