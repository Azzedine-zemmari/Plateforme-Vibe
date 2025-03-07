<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'prenom',
        'pseudo',
        'bio',
        'image',
        'email',
        'password',
        'google_id',
        'facebook_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // Define the relationship: a user has many freinds
    public function freinds(){
        return $this->hasMany(Freind::class,'user_id');
    }


    public function posts(){
        return $this->hasMany(Post::class,'userId');
    }

    public function likes(){
        return $this->hasMany(Like::class,'userId');
    }

    public function comments(){
        return $this->hasMany(Commentaire::class,'userId');
    }
    public function qrcode(){
        return $this->hasOne(Qrcode::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
}
