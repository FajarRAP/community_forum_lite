@props(['question'])

<div class="py-4">
    {{-- Title --}}
    <a href="{{ route('question.show', ['question' => $question, 'slug' => $question->slug]) }}"
        class="text-lg font-semibold text-indigo-500 hover:text-indigo-700 transition sm:text-xl">{{ $question->title }}</a>

    {{-- Body --}}
    <p class="mt-2 text-gray-600 leading-relaxed text-sm sm:text-base">{{ Str::limit($question->body, 150) }}</p>

    {{-- Meta Footer --}}
    <div class="mt-3 flex items-center justify-between text-gray-500 gap-1 text-xs sm:text-sm">
        <div class="flex gap-1">
            @foreach ($question->tags as $tag)
                <x-questions.tag :$tag />
            @endforeach
        </div>
        <p>
            <span>{{ __('asked') }}</span>
            <span class="font-medium text-gray-900">{{ $question->created_at->diffForHumans() }}</span>
            <span>{{ __('by') }}</span>
            <span class="font-medium text-indigo-600">{{ $question->user->name }}</span>
        </p>
    </div>
</div>
