@props(['question'])

<div>
    <div class="flex gap-3 py-4">
        <div>
            <x-questions.up-vote :action="route('vote', ['type' => 'questions', 'id' => $question->id])" :isUpVoted="$question->isUpVotedBy(auth()->user())" />

            <div class="text-2xl font-bold my-2 text-center text-gray-700">
                {{ $question->votes_count }}
            </div>

            <x-questions.down-vote :action="route('vote', ['type' => 'questions', 'id' => $question->id])" :isDownVoted="$question->isDownvotedBy(auth()->user())" />
        </div>

        <div class="flex flex-col gap-4 justify-between w-full">
            <p>{{ $question->body }}</p>
            <div class="flex gap-1">
                @foreach ($question->tags as $tag)
                    <x-questions.tag :$tag />
                @endforeach
            </div>
            <p class="text-sm text-gray-500 text-right">{{ __('asked') }}
                {{ $question->created_at->format('M d, Y') }}
                {{ __('at') }}
                {{ $question->created_at->format('H:i') }}
                <span class="font-medium text-indigo-600">{{ $question->user->name }}</span>
            </p>
        </div>
    </div>

    @can(['update', 'delete'], $question)
        <div class="flex items-center gap-4 mt-4 mb-6">
            <a href="{{ route('question.edit', $question) }}"
                class="text-gray-500 hover:text-indigo-600 font-medium text-sm transition">
                {{ __('Edit') }}
            </a>

            <button x-data x-on:click.prevent="$dispatch('open-modal', 'confirm-question-deletion')"
                class="text-red-500 hover:text-red-700 font-medium text-sm transition">
                {{ __('Delete') }}
            </button>
        </div>
    @endcan
</div>
