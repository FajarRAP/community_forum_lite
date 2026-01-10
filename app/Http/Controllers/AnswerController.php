<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question)
    {
        Gate::authorize('create', Answer::class);

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

    public function markAsBest(Answer $answer)
    {
        Gate::authorize('markAsBest', $answer);

        $message = '';
        $question = $answer->question;

        if ($question->best_answer_id === $answer->id) {
            $question->update(['best_answer_id' => null]);
            $message = __('The best answer has been removed.');
        } else {
            $question->update(['best_answer_id' => $answer->id]);
            $message = __('The answer has been marked as the best.');
        }

        return back()->with('success', $message);
    }

    public function edit(Answer $answer)
    {
        Gate::authorize('update', $answer);

        return view('answer.edit', [
            'answer' => $answer,
        ]);
    }

    public function update(Request $request, Answer $answer)
    {
        Gate::authorize('update', $answer);

        $validated = $request->validate([
            'body' => 'required|string|min:10',
        ]);

        $answer->update([
            'body' => $validated['body'],
        ]);

        return redirect()
            ->route('question.show', [
                'question' => $answer->question,
                'slug' => $answer->question->slug,
            ])
            ->with('success', __('The answer has been updated successfully.'));
    }

    public function destroy(Answer $answer)
    {
        Gate::authorize('delete', $answer);

        try {
            return DB::transaction(function () use ($answer) {
                $question = $answer->question;

                if ($question->best_answer_id === $answer->id) {
                    $question->update(['best_answer_id' => null]);
                }

                $answer->delete();
                $question->decrement('answers_count');

                return back()->with('success', __('The answer has been deleted successfully.'));
            });
        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('An error occurred while deleting the answer.')]);
        }
    }
}
