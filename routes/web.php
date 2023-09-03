<?php

use App\Http\Controllers\MongoTest;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware('guest');

Route::get('/register', function () {
    return view('signup');
})->middleware('guest');

Route::get('/login', function () {
    return view('login');
})->middleware('guest');

Route::get('/home', function () {
    return view('home');
})->middleware('Authorized');

Route::get('/randomPokemon', function () {
    return view('randomPokemon');
})->middleware('Authorized');

Route::get('/favoritePokemons', function () {
    return view('favoritePokemons');
})->middleware('Authorized');

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', [UserController::class, 'registerOrLoginGithub']);

Route::get('/getFavoritePokemons', [UserController::class, 'getFavoritePokemons'])->middleware('Authorized');;

Route::get('getSingleFavoritePokemon/{pokemonNumber}', [UserController::class, 'getSingleFavoritePokemon'])->middleware('Authorized');;

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::post('addRemoveFavoritePokemon', [UserController::class, 'addRemoveFavoritePokemon']);