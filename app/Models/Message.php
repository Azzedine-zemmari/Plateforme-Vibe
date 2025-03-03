<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_Id', 'message'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
