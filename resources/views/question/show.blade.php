<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-4 bg-white min-h-screen sm:px-6">
        <div class="flex flex-col-reverse gap-4 justify-between text-2xl font-medium sm:flex sm:flex-row sm:gap-16">
            <h4>{{ $question->title }}</h4>
            <a href="{{ route('question.create') }}">
                <x-primary-button
                    class="w-fit self-end sm:self-center sm:h-fit">{{ __('Ask Questions') }}</x-primary-button>
            </a>
        </div>
        <div class="text-sm text-gray-500 flex gap-4 mt-2">
            <p>
                <span>{{ __('Asked') }}</span>
                <span class="text-gray-900">{{ $question->created_at->diffForHumans() }}</span>
            </p>
            <p>
                <span>{{ __('Modified') }}</span>
                <span class="text-gray-900">{{ $question->updated_at->diffForHumans() }}</span>
            </p>
            <p>
                <span>{{ __('Viewed') }}</span>
                <span class="text-gray-900">{{ Number::abbreviate($question->views) . ' ' . __('times') }}
                </span>
            </p>
        </div>

        <div class="my-4 space-y-6">
            <div class="border-t border-gray-200">
                <x-questions.question :$question />

                @if ($question->answers_count > 0)
                    <p class="text-xl">{{ $question->answers_count }} {{ __('Answers') }}</p>

                    {{ $answers->links('components.pagination.pagination', ['includeShowing' => false]) }}

                    <div class="divide-y divide-gray-200 border-b border-gray-200">
                        @foreach ($answers as $answer)
                            <x-questions.answer :$answer :$question />
                        @endforeach
                    </div>

                    {{ $answers->links('components.pagination.pagination', ['includeShowing' => false]) }}
                @endif
            </div>

            @auth
                <form action="{{ route('answers.store', ['question' => $question]) }}" method="POST" class="space-y-4">
                    @method('POST')
                    @csrf

                    <h5 class="text-lg">{{ __('Your Answer') }}</h5>
                    <x-text-area-input name="body" rows="6" />
                    <x-primary-button>{{ __('Post Your Answer') }}</x-primary-button>
                </form>
            @endauth

            @guest
                <div class="space-y-4">
                    <h5 class="text-lg">{{ __('Your Answer') }}</h5>
                    <p>
                        <a href="{{ route('register') }}"
                            class="text-indigo-500 hover:text-indigo-700 transition">{{ __('Register') }}</a>
                        {{ __('or') }}
                        <a href="{{ route('login') }}"
                            class="text-indigo-500 hover:text-indigo-700 transition">{{ __('Login') }}</a>
                        {{ __('to post your answer.') }}
                    </p>
                    <x-primary-button>{{ __('Post Your Answer') }}</x-primary-button>
                </div>
            @endguest
        </div>
    </div>
    <x-footer />
</x-app-layout>
