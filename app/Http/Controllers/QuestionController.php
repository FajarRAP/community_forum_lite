<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index()
    {
        return view('question.index', [
            'questions' => Question::latest()->with(['tags'])->paginate(10),
            'question_count' => Question::all()->count(),
        ]);
    }

    public function show(Question $question)
    {
        return view('question.show', [
            'question' => $question->load(['answers.user']),
        ]);
    }

    public function create()
    {
        $tags = Tag::pluck('name');

        return view('question.create', [
            'tags' => $tags,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:0|max:255',
            'body' => 'required|string|min:0',
            'tags' => 'required|string',
        ]);

        return DB::transaction(function () use ($request, $validated) {
            // Create Question
            $question = Question::create([
                'user_id' => $request->user()->id,
                'title' => $validated['title'],
                'body' => $validated['body'],
                'slug' => Str::slug($validated['title']),
            ]);

            // Attach Tags
            $tags = json_decode($validated['tags']);
            $tagIds = [];
            foreach ($tags as $tag) {
                $tagName = $tag->value;
                $slug = Str::slug($tagName);
                $tag = Tag::firstOrCreate(
                    ['slug' => $slug],
                    ['name' => $tagName],
                );
                $tagIds[] = $tag->id;
            }

            $question->tags()->sync($tagIds);

            return redirect()->route('question.show', [
                'question' => $question,
                'slug' => $question->slug
            ])->with('success', 'Question created successfully.');
        });
    }
}
