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
        'name',
        'email',
        'password',
        'favorite_teams'
    ];
    use HasFactory;

}
