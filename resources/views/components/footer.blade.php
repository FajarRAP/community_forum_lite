<footer class="bg-white border-t border-gray-100">
    <div class="max-w-4xl mx-auto py-8 px-6 flex flex-col md:flex-row justify-between items-center">
        {{-- Copyright --}}
        <div class="text-gray-400 text-sm mb-4 md:mb-0">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. {{ __('All rights reserved') }}.
        </div>

        {{-- Links --}}
        <div class="flex space-x-6 text-sm text-gray-500 font-medium">
            <a href="#" class="hover:text-indigo-600 transition">{{ __('About') }}</a>
        </div>
    </div>
</footer>
