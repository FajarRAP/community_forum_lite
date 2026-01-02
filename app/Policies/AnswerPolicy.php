<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnswerPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can mark answer as best.
     */
    public function markAsBest(User $user, Answer $answer): bool
    {
        return $user->id === $answer->question->user_id;
    }

    /**
     * Determine whether the user can update the answer.
     */
    public function update(User $user, Answer $answer): bool
    {
        // User boleh edit jika dia adalah PEMBUAT jawaban tersebut
        return $user->id === $answer->user_id;
    }

    /**
     * Determine whether the user can delete the answer.
     */
    public function delete(User $user, Answer $answer): bool
    {
        // User boleh hapus jika dia adalah PEMBUAT jawaban tersebut
        return $user->id === $answer->user_id;
    }
}
