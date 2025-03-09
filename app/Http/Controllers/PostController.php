<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Freind;



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

        DB::table('posts')->insert([
        'content'=>$content,
        'image'=>$imagePath,
        'created_at'=>now(),
        'updated_at'=>now(),
        'userId'=>Auth::id()]);

        


        return $this->showPosts();

    }

    public function showPosts(){
        $posts = $this->fetchPosts();
        $authenticatedUser = Auth::user();

        return view('posts.index',compact('posts','authenticatedUser'));
    }
    private function fetchPosts(){
        // Get the authenticated user's ID
        $authenticatedUserId = Auth::id();

        // Fetch the IDs of the authenticated user's friends
        $friendIds = Freind::where(function ($query) use ($authenticatedUserId) {
            $query->where('user_id', $authenticatedUserId)
                ->orWhere('friend_id', $authenticatedUserId);
        })
        ->where('status', 'done') // Only consider active friendships
        ->pluck('friend_id') // Get the friend IDs
        ->merge([$authenticatedUserId]) // Include the authenticated user's own posts
        ->unique(); // Remove duplicates

        $posts = DB::table('posts')
        ->join('users','users.id','=','posts.userId')
        ->leftJoin('likes','likes.postId','=','posts.id')
        ->leftJoin('commentaires','commentaires.postId','=','posts.id')
        ->whereIn('posts.userId', $friendIds) // Filter posts by friend IDs
        ->select('users.name',
        'users.image',
        'posts.content',
        'posts.image as IMAGE',
        'posts.id',
        'posts.userId',
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

        return $posts;
    }

    public function EditPost(Request $request){
        $postId = $request->input('postId');

        $post = Post::find($postId);

        if($post){
            return view('posts.postForm',compact('post'));
        }
        else{
            abort(404);
        }

    }
    public function updatePost(Request $request){
        $postId = $request->input('postId');
        $content = $request->input('content');

        // find user 

        $post = Post::find($postId);



        if($request->hasFile('image')){
            if($post->image){
                Storage::disk('public')->delete($post->image);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $request->file('image')->storeAs('postPicture',$imageName,'public');
            // update post Image
            $post->image = $imagePath;  
        }

        // update the post content
        $post->content = $content;

        $post->save();

        return redirect()->route('posts');
    }
    public function deletePost($postId){
        $post = Post::findOrFail($postId);
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('posts');
    }
}
