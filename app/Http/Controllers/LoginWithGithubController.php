<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGithubController extends Controller
{
    public function redirectToGithub(){

        return Socialite::driver('github')->redirect();
        
    }
    public function handleGithubCallback(){

        $githubUser = Socialite::driver('github')->stateless()->user();

        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_token' => $githubUser->token,
        ]);
    
        Auth::login($user);
    
        return redirect('/posts');
    }
}
