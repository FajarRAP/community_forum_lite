@props(['question' => null, 'tags' => []])

@php
    $action = $question ? route('question.update', $question) : route('question.store');
    $method = $question ? 'PUT' : 'POST';
    $tagsValue = $question ? $question->tags->pluck('name')->implode(',') : '';
    $buttonText = $question ? __('Update Your Question') : __('Post Your Question');
@endphp

<form method="POST" action="{{ $action }}" class="mt-8">
    @csrf
    @method($method)

    <div class="mt-8">
        <div class="flex">
            <x-input-label for="title" :value="__('Title')" class="font-bold !text-base" />
            <x-red-asterisk />
        </div>
        <span
            class="text-gray-500 text-xs">{{ __('Be specific and imagine you\'re asking a question to another person. Min 15 characters.') }}</span>
        <x-text-input id="title" class="block mt-1 w-full" name="title" :value="old('title', $question?->title)" required />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>
    <div class="mt-8">
        <div class="flex">
            <x-input-label for="body" :value="__('Body')" class="font-bold !text-base" />
            <x-red-asterisk />
        </div>
        <span
            class="text-gray-500 text-xs">{{ __('Include all the information someone would need to answer your question. Min 220 characters.') }}</span>
        <x-text-area-input id="body" class="block mt-1 w-full" name="body" rows="10" :value="old('body', $question?->body)"
            required />
        <x-input-error :messages="$errors->get('body')" class="mt-2" />
    </div>
    <div class="mt-8">
        <div class="flex">
            <x-input-label for="tags" :value="__('Tags')" class="font-bold !text-base" />
            <x-red-asterisk />
        </div>
        <span
            class="text-gray-500 text-xs">{{ __('Add up to 5 tags to describe what your question is about. Start typing to see suggestions.') }}</span>
        <x-text-input id="tags" class="mt-1 w-full" name="tags" :value="old('tags', $tagsValue)" required />
        <x-input-error :messages="$errors->get('tags')" class="mt-2" />
    </div>

    <x-primary-button class="mt-8">{{ $buttonText }}</x-primary-button>
</form>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

    <style>
        :root {
            --tagify-dd-color-primary: #6366f1;
        }
    </style>
@endpush

@push('scripts')
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
