<?php

namespace App\Trait;

use App\Models\User;
use App\Models\Vote;

trait Votable
{
    public function votes()
    {
        return $this->morphMany(Vote::class, 'votable');
    }

    public function isUpVotedBy(?User $user)
    {
        if (!$user) return false;

        return $this->votes()->where('user_id', $user->id)->where('value', 1)->exists();
    }

    public function isDownVotedBy(?User $user)
    {
        if (!$user) return false;

        return $this->votes()->where('user_id', $user->id)->where('value', -1)->exists();
    }
}
