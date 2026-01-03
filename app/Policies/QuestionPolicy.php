<?php

namespace App\Policies;

use App\Models\User;

class QuestionPolicy
{
    public function create(User $user): bool
    {
        return true;
    }
}
