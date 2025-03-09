<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    // Redirection vers Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback de Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Trouver ou créer l'utilisateur
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(uniqid()), // Mot de passe aléatoire
            ]
        );

        // Connecter l'utilisateur
        Auth::login($user);

        return redirect('/dashboard');
    }

    // Redirection vers Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Callback de Facebook
    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        // Trouver ou créer l'utilisateur
        $user = User::firstOrCreate(
            ['email' => $facebookUser->getEmail()],
            [
                'name' => $facebookUser->getName(),
                'password' => bcrypt(uniqid()), // Mot de passe aléatoire
            ]
        );

        // Connecter l'utilisateur
        Auth::login($user);

        return redirect('/dashboard');
    }
}