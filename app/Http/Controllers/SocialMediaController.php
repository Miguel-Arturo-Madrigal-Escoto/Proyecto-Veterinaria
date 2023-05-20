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
    use AlertController;

    public function redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function callbackFromGithub(){

        try {
            //code...
            // retrieve github user
            $github_user = Socialite::driver('github')->stateless()->user();

            $user = User::where([
                ['email', $github_user->email],
            ])->first();

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
            else {
                // user exists, set the provider id
                $user->github_id = $github_user->id;
                $user->save();
            }

            // log the user in
            Auth::login($user);
            return redirect()->route('dashboard');

        } catch (\Throwable $th) {
            $this->__alert__('error', 'No es posible iniciar sesión con Github.');
        }

    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle(){
        try {
            //code...
            // retrieve google user
            $google_user = Socialite::driver('google')->stateless()->user();

            $user = User::where([
                ['email', $google_user->email],
            ])->first();


            // so, user (with that email) doesn't exists, create it
            if (is_null($user)){
                $user = new User();
                $user->name = $google_user->user['given_name'];
                $user->lastname = $google_user->user['family_name'];
                $user->email = $google_user->email;
                $user->gender = '';
                $user->phone = '';
                $user->google_id = $google_user->id;
                $user->password  = Hash::make(md5('5N0VYat0NJKWNlnd8OlH'));
                $user->email_verified_at  = now();
                $user->save();
            }
            else {
                // user exists, set the provider id
                $user->google_id = $google_user->id;
                $user->save();
            }

            // log the user in
            Auth::login($user);
            return redirect()->route('dashboard');

        } catch (\Throwable $th) {
            $this->__alert__('error', 'No es posible iniciar sesión con Google.');
        }
    }

    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook(){
        try {
            //code...
            // retrieve facebook user
            $facebook_user = Socialite::driver('facebook')->stateless()->user();

            $user = User::where([
                ['email', $facebook_user->email],
            ])->first();


            // so, user doesn't exists, create it
            if (is_null($user)){
                $user = new User();
                $user->name = $facebook_user->name;
                $user->lastname = '';
                $user->email = $facebook_user->email;
                $user->gender = '';
                $user->phone = '';
                $user->facebook_id = $facebook_user->id;
                $user->password  = Hash::make(md5('5N0VYat0NJKWNlnd8OlH'));
                $user->email_verified_at  = now();
                $user->save();
            }
            else {
                // user exists, set the provider id
                $user->facebook_id = $facebook_user->id;
                $user->save();
            }
            // log the user in
            Auth::login($user);
            return redirect()->route('dashboard');

        } catch (\Throwable $th) {
            $this->__alert__('error', 'No es posible iniciar sesión con Facebook.');
        }
    }

}
