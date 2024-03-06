<?php

namespace App\Http\Controllers\user\Index;

use App\Models\User;

class IndexRepository
{
    public function register($data)
    {
        return User::create($data);
    }
}
