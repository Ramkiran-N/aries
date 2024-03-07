<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
       'answers',
       'total_mark',
       'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

