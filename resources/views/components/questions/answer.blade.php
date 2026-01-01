@props(['answer'])

<div class="flex gap-3 py-4">
    <div>
        <x-questions.up-vote :action="route('vote', ['type' => 'answers', 'id' => $answer->id])" :isUpVoted="$answer->isUpVotedBy(auth()->user())" />

        <div class="text-2xl font-bold my-2 text-center text-gray-700">
            {{ $answer->votes_count }}
        </div>

        <x-questions.down-vote :action="route('vote', ['type' => 'answers', 'id' => $answer->id])" :isDownVoted="$answer->isDownvotedBy(auth()->user())" />
    </div>
    <div class="space-y-4 w-full">
        <p>{{ $answer->body }}</p>
        <p class="text-sm text-gray-500 text-right">{{ __('answered') }}
            {{ $answer->created_at->format('M d, Y') }}
            {{ __('at') }}
            {{ $answer->created_at->format('H:i') }}
            <span class="font-medium text-indigo-600">{{ $answer->user->name }}</span>
        </p>
    </div>
</div>
