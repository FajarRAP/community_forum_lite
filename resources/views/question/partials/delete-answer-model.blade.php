<x-modal name="confirm-answer-deletion" focusable>
    <form method="post" x-bind:action="action" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to delete this answer?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once this answer is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this answer.') }}
        </p>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Delete Answer') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
