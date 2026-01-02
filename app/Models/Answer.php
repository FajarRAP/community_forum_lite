<?php

namespace App\Models;

use App\Trait\Votable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes, Votable;

    protected $fillable = ['user_id', 'question_id', 'body', 'votes_count'];

    public function isBestAnswer(Question $question)
    {
        return $this->id === $question->best_answer_id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
