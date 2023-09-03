<?php

namespace App\Http\Controllers;

use App\Rules\UniqueEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use SebastianBergmann\Environment\Console;



class UserController extends Controller
{
    
    public function index()
    {
        return view('home');
    }

    public function register(Request $request)
    {
        
        $incomingFields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', new UniqueEmail],
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8|same:password',
        ]);

        $user = new User();

        $user->name = $incomingFields['name'];
        $user->email = $incomingFields['email'];
        $user->password = Hash::make($incomingFields['password']);
        
        $user->favorite_pokemon = [];
        $user->save();
        Auth::login($user);

        return redirect('/home');
        
    }

    public function registerOrLoginGithub(){

        $userGithub = Socialite::driver('github')->stateless()->user();
       
        $user = User::where('email', $userGithub->email)->first();

        if($user){
            Auth::login($user);
            return redirect('/home');
        }

        $user = new User();
       
        $user->name = $userGithub->name;
        $user->username = $userGithub->nickname;
        $user->email = $userGithub->email;
        $user->github_id = Hash::make($userGithub->id);
        $user->token = $userGithub->token;
        $user->favorite_pokemon = [];
      
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

        $user = User::where('email', $incomingFields['email'])->first();

        if ($user && Hash::check($incomingFields['password'], $user->password)) {
            Auth::login($user);
            return redirect('/home');
        } else {
            return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => 'Invalid credentials']);
     
        }

    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }

    function addRemoveFavoritePokemon(Request $request){


        $incomingFields = $request->validate(
            [
                'pokemon' => 'required',
            ]
        );

        $pokemon = $incomingFields['pokemon'];

        $user = Auth::user();

        if(User::where('email', $user->email)->where('favorite_pokemon', $pokemon)->first()){
            User::where('email', $user->email)->pull('favorite_pokemon', $pokemon);
            $user->save();
            return $user->favorite_pokemon;
        }

        User::where('email', $user->email)->push('favorite_pokemon', $pokemon);
        
        $user->save();
        
        return $user->favorite_pokemon;

    }

    public function getFavoritePokemons(Request $request)
    {
        
        $user = Auth::user();
        return response()->json(['favoritePokemons' => $user->favorite_pokemon]);

    }

    public function getSingleFavoritePokemon($pokemonNumber){
            
            $user = Auth::user();
            $pokemonNumber = $user->where('favorite_pokemon', $pokemonNumber)->first();
           
            if($pokemonNumber == null){
                return false;
            }
            return true;
    }

}
