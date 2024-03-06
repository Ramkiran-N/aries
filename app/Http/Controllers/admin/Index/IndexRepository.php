<?php

namespace App\Http\Controllers\admin\Index;

use App\Models\Question;

class IndexRepository
{
    public function storeQuestion($data)
    {
        return Question::create($data);
    }
    public function getQuestions()
    {
        return Question::all();
    }
    public function getAnswers($id)
    {
        return Question::find($id);
    }
}
