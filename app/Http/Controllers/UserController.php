<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;



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
        $user = new User();

        $user->name = $incomingFields['name'];
        $user->email = $incomingFields['email'];
        $user->password = Hash::make($incomingFields['password']);
        $user->push('favorite_teams', 'Barcelona');
        $user->push('favorite_teams', 'Real Madrid');
        $user->save();
        Auth::login($user);

        return redirect('/');
        
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
        
        return redirect('/');

    }

    function addFavoriteTeam(Request $request){

        $incomingFields = $request->validate(
            [
                'team' => 'required',
            ]
        );
        $user = Auth::user();

        if($user->favorite_teams->contains($incomingFields['team'])){
            return redirect('/');
        }

        $user->push('favorite_teams', $incomingFields['team']);
        $user->save();
        return redirect('/');

    }

    function removeFavoriteTeam(Request $request){

        $user = Auth::user();
        $user->pull('favorite_teams', $request->team);
        $user->save();
        return redirect('/');

    }

}
