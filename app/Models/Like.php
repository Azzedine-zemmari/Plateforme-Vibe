<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function post(){
        return $this->belongsTo(Post::class,'postId');
    }
    public function user(){
        return $this->belongsTo(Post::class,'userId');
    }

    protected $fillable = [
        'postId',
        'userId'
    ];
}
