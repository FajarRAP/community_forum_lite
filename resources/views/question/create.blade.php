<x-app-layout>
    <div class="max-w-4xl mx-auto py-4 bg-white min-h-screen px-4 sm:px-6">
        <div class="flex justify-between items-end text-xl font-medium sm:text-2xl">
            <h1>{{ __('Ask Question') }}</h1>
            <p class="font-light text-sm text-gray-700">{{ __('Required fields') }}<x-red-asterisk /></p>
        </div>
        <form method="POST" action="{{ route('question.store') }}" class="mt-8">
            @csrf
            <div class="mt-8">
                <div class="flex">
                    <x-input-label for="title" :value="__('Title')" class="font-bold !text-base" />
                    <x-red-asterisk />
                </div>
                <span
                    class="text-gray-500 text-xs">{{ __('Be specific and imagine you\'re asking a question to another person. Min 15 characters.') }}</span>
                <x-text-input id="title" class="block mt-1 w-full" name="title" :value="old('title')" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="mt-8">
                <div class="flex">
                    <x-input-label for="body" :value="__('Body')" class="font-bold !text-base" />
                    <x-red-asterisk />
                </div>
                <span
                    class="text-gray-500 text-xs">{{ __('Include all the information someone would need to answer your question. Min 220 characters.') }}</span>
                <x-text-input id="body" class="block mt-1 w-full" name="body" :value="old('body')" required />
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>
            <div class="mt-8">
                <div class="flex">
                    <x-input-label for="tags" :value="__('Tags')" class="font-bold !text-base" />
                    <x-red-asterisk />
                </div>
                <span
                    class="text-gray-500 text-xs">{{ __('Add up to 5 tags to describe what your question is about. Start typing to see suggestions.') }}</span>
                <x-text-input id="tags" class="block mt-1 w-full" name="tags" :value="old('tags')" required />
                <x-input-error :messages="$errors->get('tags')" class="mt-2" />
            </div>

            <x-primary-button class="mt-8">{{ __('Post Your Question') }}</x-primary-button>
        </form>
    </div>
    <x-footer />

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

        <script>
            const whitelist = @json($tags);
            const tagInput = document.querySelector('input[name=tags]');
            const tagify = new Tagify(tagInput, {
                whitelist: whitelist,
                maxTags: 5,
                dropdown: {
                    enabled: 0,
                    maxItems: 5,
                    closeOnSelect: false,
                }
            });
        </script>
    @endpush
</x-app-layout>
