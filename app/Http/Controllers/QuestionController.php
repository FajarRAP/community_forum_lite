<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('question.index', [
            'questions' => $questions,
            'question_count' => $questions->count(),
        ]);
    }
}
