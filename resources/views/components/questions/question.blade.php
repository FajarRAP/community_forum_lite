@props(['question'])

<div class="flex gap-3 py-4">
    <div>
        {{-- {{ $question->isUpvotedBy(auth()->user()) ? 'bg-orange-100 border-orange-500 text-orange-600' : 'text-gray-400' }} --}}
        <x-questions.up-vote :action="route('vote', ['type' => 'questions', 'id' => $question->id])" />

        <div class="text-2xl font-bold my-2 text-center text-gray-700">
            {{ $question->votes_count }}
        </div>

        {{-- {{ $question->isDownvotedBy(auth()->user()) ? 'bg-orange-100 border-orange-500 text-orange-600' : 'text-gray-400' }} --}}
        <x-questions.down-vote :action="route('vote', ['type' => 'questions', 'id' => $question->id])" />
    </div>

    <div class="space-y-2">
        <p>{{ $question->body }}</p>
        <div class="flex gap-1">
            @foreach ($question->tags as $tag)
                <x-questions.tag :$tag />
            @endforeach
        </div>
    </div>
</div>
