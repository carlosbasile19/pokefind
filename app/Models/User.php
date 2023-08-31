<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Auth\User as Authenticable;


class User extends Authenticable 
{
    protected $connection = 'mongodb';
    protected $database = 'proyecto';
    protected $collection = 'Users';
    protected $fillable = [
        'github_id',
        'name',
        'email',
        'password',
        'token',
        'favorite_pokemon'
    ];

    use HasFactory;

}
