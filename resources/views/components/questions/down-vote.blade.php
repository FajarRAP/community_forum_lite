@props(['action', 'isDownVoted' => false])

<form action="{{ $action }}" method="POST">
    @csrf
    <input type="hidden" name="value" value="-1">
    <button type="submit"
        class="p-2 border rounded-full size-10 flex items-center justify-center {{ $isDownVoted ? 'bg-indigo-100 border-indigo-500 text-indigo-600' : 'text-gray-900' }}">
        ▼
    </button>
</form>
