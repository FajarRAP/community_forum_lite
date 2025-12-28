<x-app-layout>
    <div class="max-w-4xl mx-auto py-4 bg-white min-h-screen">
        <div class="flex justify-between text-2xl font-medium px-6">
            <h1>{{ __('Newest Questions') }}</h1>
            <x-primary-button>{{ __('Ask Questions') }}</x-primary-button>
        </div>

        <p class="mt-8 px-6 text-lg">{{ $question_count }} {{ __('questions') }}</p>

        <div class="mt-8">
            @foreach ($questions as $question)
                <x-questions.item :$question />
            @endforeach
        </div>
    </div>
    <x-footer />
</x-app-layout>
