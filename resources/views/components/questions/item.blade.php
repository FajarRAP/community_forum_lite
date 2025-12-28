@props(['question'])

<div class="px-6 py-4 border-t border-gray-200">
    {{-- Title --}}
    <a href="#"
        class="text-xl font-semibold text-indigo-500 hover:text-indigo-700 transition">{{ $question->title }}</a>

    {{-- Body --}}
    <p class="mt-2 text-gray-600 leading-relaxed">{{ Str::limit($question->body, 150) }}</p>

    {{-- Meta Footer --}}
    <div class="mt-3 flex items-center justify-end text-sm text-gray-500 gap-1">
        <span>{{ __('asked') }}</span>
        <span class="font-medium text-gray-900">{{ $question->created_at->diffForHumans() }}</span>
        <span>{{ __('by') }}</span>
        <span class="font-medium text-indigo-600">{{ $question->user->name }}</span>
    </div>
</div>
