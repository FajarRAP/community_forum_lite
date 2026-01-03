@props(['question'])

@php
    $color = '';
    if ($question->views > 100) {
        $color = 'text-red-600';
    } elseif ($question->views > 50) {
        $color = 'text-amber-600';
    } else {
        $color = 'text-gray-500';
    }
@endphp

<div class="py-4 flex gap-3">
    <div class="flex flex-col gap-1.5 items-end basis-1/5">
        <p class="text-xs sm:text-sm">{{ $question->votes_count . ' ' . __('votes') }} </p>
        @if ($question->answers_count > 0)
            <p class="text-xs text-green-700 border border-green-700 rounded px-1.5 sm:text-sm">
                {{ $question->answers_count . ' ' . __('answers') }}
            </p>
        @else
            <p class="text-xs text-gray-500 sm:text-sm">{{ $question->answers_count . ' ' . __('answers') }}</p>
        @endif
        <p class="text-xs {{ $color }} sm:text-sm">{{ $question->viewsDisplay() . ' ' . __('views') }} </p>
    </div>
    <div>
        {{-- Title --}}
        <a href="{{ route('question.show', ['question' => $question, 'slug' => $question->slug]) }}"
            class="text-lg font-semibold text-indigo-500 hover:text-indigo-700 transition sm:text-xl">{{ $question->title }}</a>

        {{-- Body --}}
        <p class="mt-2 text-gray-600 leading-relaxed text-sm sm:text-base">{{ $question->bodyPreview() }}</p>

        {{-- Meta Footer --}}
        <div
            class="mt-3 flex flex-col items-start text-gray-500 gap-2 text-xs sm:flex-row sm:justify-between sm:text-sm sm:gap-1 sm:items-center">
            <div class="flex gap-1">
                @foreach ($question->tags as $tag)
                    <x-questions.tag :$tag />
                @endforeach
            </div>
            <p class="self-end sm:self-auto">
                <span>{{ __('asked') }}</span>
                <span class="font-medium text-gray-900">{{ $question->created_at->diffForHumans() }}</span>
                <span>{{ __('by') }}</span>
                <span class="font-medium text-indigo-600">{{ $question->user->name }}</span>
            </p>
        </div>
    </div>
</div>
