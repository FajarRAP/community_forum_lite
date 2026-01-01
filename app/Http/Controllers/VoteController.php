<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $type, int $id)
    {
        $validated = $request->validate([
            'value' => 'required|in:1,-1',
        ]);

        $user = $request->user();
        $value = (int) $validated['value'];
        $modelClass = match ($type) {
            'questions' => Question::class,
            'answers' => Answer::class,
            default => abort(404),
        };
        $model = $modelClass::findOrFail($id);

        if ($model->user_id === $user->id) {
            return back()->withErrors(['vote' => 'You cannot vote on your own post.']);
        }

        DB::transaction(function () use ($model, $user, $value) {
            $existingVote = $model->votes()->where('user_id', $user->id)->first();

            if ($existingVote) {
                if ($existingVote->value == $value) {
                    // User is trying to vote the same way again, remove the vote
                    $existingVote->delete();
                } else {
                    // User is changing their vote
                    $existingVote->update(['value' => $value]);
                }
            } else {
                // Create a new vote
                $model->votes()->create([
                    'user_id' => $user->id,
                    'value' => $value,
                ]);
            }

            $totalVotes = $model->votes()->sum('value');
            $model->update(['votes_count' => $totalVotes]);
        });

        return back()->with('success', 'Your vote has been recorded.');
    }
}
