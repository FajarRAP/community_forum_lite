<x-app-layout>
    <div class="max-w-4xl mx-auto py-4 bg-white min-h-screen px-4 sm:px-6">
        <div class="flex justify-between items-end text-xl font-medium sm:text-2xl">
            <h1>{{ __('Edit Answer') }}</h1>
            <p class="font-light text-sm text-gray-700">{{ __('Required fields') }}<x-red-asterisk /></p>
        </div>
        <form action="{{ route('answer.update', $answer) }}" method="POST" class="space-y-4">
            @method('PUT')
            @csrf

            <h5 class="text-lg">{{ __('Your Answer') }}</h5>
            <x-text-area-input name="body" rows="10" :value="old('body', $answer->body)" />
            <x-primary-button>{{ __('Update Your Answer') }}</x-primary-button>
        </form>
    </div>

    <x-footer />
</x-app-layout>
