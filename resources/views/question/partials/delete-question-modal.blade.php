@props(['question'])

<x-modal name="confirm-question-deletion" focusable>
    <form method="post" action="{{ route('question.destroy', $question) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to delete this question?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once this question is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this question.') }}
        </p>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Delete Question') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
