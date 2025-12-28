<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tag;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {

        return view('question.index', [
            'questions' => Question::latest()->paginate(5),
            'question_count' => Question::all()->count(),
        ]);
    }

    public function show(Question $question)
    {
        return view('question.show', [
            'question' => $question,
        ]);
    }

    public function create()
    {
        $tags = Tag::pluck('name');

        return view('question.create', [
            'tags' => $tags,
        ]);
    }
}
