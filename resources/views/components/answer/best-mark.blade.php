@props(['answer', 'question'])

@php
    $isBest = $answer->isBestAnswer($question);
    $canMark = auth()->user()?->can('markAsBest', $answer);
    $classes = $isBest ? 'text-green-600 bg-green-100 hover:bg-green-200' : 'text-gray-300 hover:text-green-500';
@endphp

@if ($canMark)
    <form action="{{ route('answer.markAsBest', ['answer' => $answer]) }}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" title="Mark as best answer"
            class="p-1 rounded-full transition-colors duration-200 {{ $classes }}">
            <x-svgs.check />
        </button>
    </form>
@elseif ($isBest)
    <div class="text-green-600" title="The question owner accepted this as the best answer">
        <x-svgs.check />
    </div>
@endif
