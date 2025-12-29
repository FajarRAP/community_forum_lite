<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question)
    {
        $validated = $request->validate([
            'body' => 'required|string|min:10',
        ]);

        $duplicate = Answer::where('question_id', $question->id)
            ->where('user_id', $request->user()->id)
            ->where('body', $validated['body'])
            ->exists();

        if ($duplicate) {
            return back()->withErrors(['body' => 'You have already submitted this answer.']);
        }

        return DB::transaction(function () use ($question, $request, $validated) {
            Answer::create([
                'question_id' => $question->id,
                'user_id' => $request->user()->id,
                'body' => $validated['body'],
            ]);

            $question->increment('answers_count');

            return back()->with('success', __('Your answer has been posted successfully.'));
        });
    }
}
