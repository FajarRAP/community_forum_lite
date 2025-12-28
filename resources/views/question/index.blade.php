<x-app-layout>
    <div class="max-w-4xl mx-auto py-4 bg-white min-h-screen px-4 sm:px-6">
        <div class="flex justify-between text-xl font-medium sm:text-2xl">
            <h1>{{ __('Newest Questions') }}</h1>
            <x-primary-button>{{ __('Ask Questions') }}</x-primary-button>
        </div>

        <p class="mt-8 text-base sm:text-lg">{{ $question_count }} {{ __('questions') }}</p>

        <div class="divide-y divide-gray-200 border-y my-8">
            @foreach ($questions as $question)
                <x-questions.item :$question />
            @endforeach
        </div>

        {{ $questions->links('components.pagination.pagination') }}
    </div>
    <x-footer />
</x-app-layout>
