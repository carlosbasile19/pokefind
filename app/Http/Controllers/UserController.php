<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;



class UserController extends Controller
{
    
    public function index()
    {
        return view('home');
    }

    public function register(Request $request)
    {
        
            $incomingFields = $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|min:8',
                ]
            );

        $user = User::where('email', $incomingFields['email'])->first();

        if($user != null){
            return redirect('/register');
        }

        $user = new User();

        $user->name = $incomingFields['name'];
        $user->email = $incomingFields['email'];
        $user->password = Hash::make($incomingFields['password']);
        $user->save();
        Auth::login($user);

        return redirect('/home');
        
    }

    public function registerOrLoginGithub(){

        $userGithub = Socialite::driver('github')->user();

        if($userGithub == null){
            return redirect('/register');
        }

        $user = User::where('github_id', Hash::make($userGithub->id))->first();

        if($user != null){
            Auth::login($user);
            return redirect('/home');
        }

        $user = new User();
       
        $user->name = $userGithub->name;
        $user->username = $userGithub->nickname;
        $user->email = $userGithub->email;
        $user->github_id = Hash::make($userGithub->id);
        $user->token = $userGithub->token;
      
        $user->save();
        Auth::login($user);
        return redirect('/home');

    }

    public function login(Request $request){

        $incomingFields = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]
        );

        $incomingFields['password'] = Hash::make($incomingFields['password']);
        
        $user = User::where('email', $incomingFields['email'])->where('password', $incomingFields['password'])->first();
        
        if(!$user){
            return redirect('/register');
        }
        
        return redirect('/home');

    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }

    function addFavoritePokemon(Request $request){

        $incomingFields = $request->validate(
            [
                'pokemon' => 'required',
            ]
        );
        $user = Auth::user();

        if($user->favorite_pokemon->contains($incomingFields['pokemon'])){
            return redirect('/');
        }

        $user->push('favorite_pokemon', $incomingFields['pokemon']);
        $user->save();
        return redirect('/');

    }

    function removeFavoritePokemon(Request $request){

        if(Auth::user() == null){
            return redirect('/');
        }

        $incomingFields = $request->validate(
            [
                'pokemon' => 'required',
            ]
        );

        $user = Auth::user();

        if(!$user->favorite_pokemon->contains($incomingFields['pokemon'])){
            return redirect('/');
        }

        $user->pull('favorite_pokemon', $incomingFields['pokemon']);
        $user->save();
        return redirect('/');

    }

}
