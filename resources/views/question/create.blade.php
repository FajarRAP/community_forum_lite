<x-app-layout>
    <div class="max-w-4xl mx-auto py-4 bg-white min-h-screen px-4 sm:px-6">
        <div class="flex justify-between items-end text-xl font-medium sm:text-2xl">
            <h1>{{ __('Ask Question') }}</h1>
            <p class="font-light text-sm text-gray-700">{{ __('Required fields') }}<x-red-asterisk /></p>
        </div>
        @include('question.partials.question-form', ['tags' => $tags])
    </div>

    <x-footer />
</x-app-layout>
