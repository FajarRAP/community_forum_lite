@props(['answer', 'question'])

@php
    $user = auth()->user();
    $action = route('vote', ['type' => 'answers', 'id' => $answer->id]);
    $isUpVoted = $answer->isUpVotedBy($user);
    $isDownVoted = $answer->isDownvotedBy($user);
@endphp

<div>
    <div class="flex gap-3 py-4">
        <div>
            <x-questions.up-vote :$action :$isUpVoted />

            <div class="text-2xl font-bold my-2 text-center text-gray-700">
                {{ $answer->votes_count }}
            </div>

            <x-questions.down-vote :$action :$isDownVoted />

            <div class="mt-3 flex justify-center">
                <x-answer.best-mark :$answer :$question />
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
    @can(['update', 'delete'], $answer)
        <div class="flex items-center gap-4 mt-4 mb-6">
            <a href="{{ route('answer.edit', $answer) }}"
                class="text-gray-500 hover:text-indigo-600 font-medium text-sm transition">
                {{ __('Edit') }}
            </a>

            <button x-data
                x-on:click.prevent="
                action = '{{ route('answer.destroy', $answer) }}'; 
                $dispatch('open-modal', 'confirm-answer-deletion')"
                class="text-red-500 hover:text-red-700 font-medium text-sm transition">
                {{ __('Delete') }}
            </button>
        </div>
    @endcan
</div>
