<?php

namespace App\Http\Controllers\user\Index;

use App\Models\Result;
use App\Models\User;

class IndexRepository
{
    public function register($data)
    {
        return User::create($data);
    }
    public function getUserWithEmail($email)
    {
        return User::where('email',$email)->select('id')->first();
    }
    public function saveResult($data)
    {
        return Result::create($data);
    }
    public function getResult($email)
    {
        return User::where('email',$email)->with('result')->first();
    }
    public function getResults()
    {
        return User::with('result')->get();
    }
}
