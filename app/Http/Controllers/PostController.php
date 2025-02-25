<?php

namespace App\Http\Controllers;

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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $request->file('image')->storeAs('postPicture', $imageName, 'public');
        }
        else{
            $imagePath = null;
        }

        DB::table('posts')->insert(['content'=>$content,'image'=>$imagePath,'created_at'=>now(),'updated_at'=>now()]);

        return view('posts.index');

    }
}
