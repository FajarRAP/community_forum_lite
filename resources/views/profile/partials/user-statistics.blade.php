<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="p-6 bg-white shadow sm:rounded-lg flex items-center">
        <div class="p-3 rounded-full bg-amber-100 text-amber-600 mr-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                </path>
            </svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">{{ __('Reputation Score') }}</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['reputation'] }}</p>
        </div>
    </div>

    <div class="p-6 bg-white shadow sm:rounded-lg flex items-center">
        <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">{{ __('Total Questions') }}</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['questions_count'] }}</p>
        </div>
    </div>

    <div class="p-6 bg-white shadow sm:rounded-lg flex items-center">
        <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                </path>
            </svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">{{ __('Total Answers') }}</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['answers_count'] }}</p>
        </div>
    </div>
</div>
