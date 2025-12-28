<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-4 bg-white min-h-screen sm:px-6">
        <div
            class="flex flex-col flex-col-reverse gap-4 justify-between text-2xl font-medium sm:flex sm:flex-row sm:gap-16">
            <h4>{{ $question->title }}</h4>
            <x-primary-button class="w-fit self-end sm:self-center sm:h-fit">{{ __('Ask Questions') }}</x-primary-button>
        </div>
        <div class="text-sm text-gray-500 flex gap-4 mt-2">
            <p>
                <span>Asked</span>
                <span class="text-gray-900">{{ $question->created_at->diffForHumans() }}</span>
            </p>
            <p>
                <span>Modified</span>
                <span class="text-gray-900">{{ $question->updated_at->diffForHumans() }}</span>
            </p>
        </div>
        <hr class="my-4">
        <p>{{ $question->body }}</p>
        <hr class="my-4">
        <h5 class="text-lg">{{ __('Your Answer') }}</h5>
        <x-primary-button class="mt-2">{{ __('Post Your Answer') }}</x-primary-button>
    </div>
    <x-footer />
</x-app-layout>
