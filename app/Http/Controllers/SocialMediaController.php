<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Hash;

class SocialMediaController extends Controller
{
    //

    public function redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function callbackFromGithub(){

        try {
            //code...
            // retrieve github user
            $github_user = Socialite::driver('github')->stateless()->user();

            $user = User::where('github_id', $github_user->id)->orWhere('email', $github_user->email)->first();

            // so, user doesn't exists, create it
            if (is_null($user)){
                $user = new User();
                $user->name = $github_user->name;
                $user->lastname = '';
                $user->email = $github_user->email;
                $user->gender = '';
                $user->phone = '';
                $user->github_id = $github_user->id;
                $user->password  = Hash::make(md5('5N0VYat0NJKWNlnd8OlH'));
                $user->email_verified_at  = now();
                $user->save();
            }
            // log the user in
            Auth::login($user);
            return redirect('dashboard');

        } catch (\Throwable $th) {
            dd($th);
        }

    }

}
