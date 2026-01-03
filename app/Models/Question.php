<?php

namespace App\Models;

use App\Trait\Votable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory, SoftDeletes, Votable;

    protected $fillable = ['user_id', 'title', 'body', 'slug', 'votes_count', 'best_answer_id'];

    public function incrementViewCount(): void
    {
        DB::table('questions')->where('id', $this->id)->increment('views');
        $this->views++;
    }

    public function viewsDisplay()
    {
        return Number::abbreviate($this->views);
    }

    public function bodyPreview()
    {
        return Str::limit($this->body, 150);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
