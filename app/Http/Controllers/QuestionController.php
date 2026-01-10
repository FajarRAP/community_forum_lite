<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $questions = Question::with(['user', 'tags'])
            ->searchQuestion($search)
            ->latest()
            ->paginate(10);

        return view('question.index', [
            'questions' => $questions->appends(['search' => $search]),
            'question_count' => $questions->total(),
        ]);
    }

    public function show(Question $question, string $slug)
    {
        if ($question->slug !== $slug) {
            return redirect()->route('question.show', [
                'question' => $question,
                'slug' => $question->slug,
            ], 301);
        }

        $question->load(['user', 'tags']);

        $question->incrementViewCount();

        $answers = $question->answers()
            ->with('user')
            ->latest()
            ->paginate(5);

        return view('question.show', [
            'question' => $question,
            'answers' => $answers,
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
        Gate::authorize('create', Question::class);

        $validated = $request->validate([
            'title' => 'required|string|min:10|max:255',
            'body' => 'required|string|min:50',
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
            $tags = json_decode($validated['tags']) ?? [];
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

    public function destroy(Question $question)
    {
        Gate::authorize('delete', $question);

        try {
            $question->delete();

            return redirect()->route('home')
                ->with('success', 'Question deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('Failed to delete the question. Please try again.');
        }
    }
}
