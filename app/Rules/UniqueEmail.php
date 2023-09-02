<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueEmail implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the email already exists in MongoDB
        return DB::connection('mongodb')
            ->collection('Users')
            ->where('email', $value)
            ->count() === 0;
    }

    public function message()
    {
        return 'The email address has already been taken.';
    }
}
