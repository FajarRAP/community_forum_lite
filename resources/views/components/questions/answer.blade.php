@props(['answer', 'question'])

<div class="flex gap-3 py-4">
    <div>
        <x-questions.up-vote :action="route('vote', ['type' => 'answers', 'id' => $answer->id])" :isUpVoted="$answer->isUpVotedBy(auth()->user())" />

        <div class="text-2xl font-bold my-2 text-center text-gray-700">
            {{ $answer->votes_count }}
        </div>

        <x-questions.down-vote :action="route('vote', ['type' => 'answers', 'id' => $answer->id])" :isDownVoted="$answer->isDownvotedBy(auth()->user())" />

        <div class="mt-3">
            @if ($question->user_id === auth()->user()->id)
                <form action="{{ route('answers.markAsBest', ['answer' => $answer]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" title="Mark as best answer"
                        class="p-1 rounded-full transition-colors duration-200
                        {{ $question->best_answer_id === $answer->id
                            ? 'text-green-600 bg-green-100 hover:bg-green-200'
                            : 'text-gray-300 hover:text-green-500' }}">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </button>
                </form>
            @elseif($question->best_answer_id === $answer->id)
                <div class="text-green-600" title="The question owner accepted this as the best answer">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            @endif
        </div>
    </div>
    <div class="flex flex-col gap-4 justify-between w-full">
        <p>{{ $answer->body }}</p>
        <p class="text-sm text-gray-500 text-right items-end">{{ __('answered') }}
            {{ $answer->created_at->format('M d, Y') }}
            {{ __('at') }}
            {{ $answer->created_at->format('H:i') }}
            <span class="font-medium text-indigo-600">{{ $answer->user->name }}</span>
        </p>
    </div>
</div>
