<x-app-layout>
    <div class="max-w-5xl mx-auto py-8 px-4">
        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">My Boards</h1>
            <a href="{{ route('boards.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Create Board</a>
        </div>

        @foreach($boards as $board)
            <div class="bg-white shadow rounded p-4 mb-3 flex justify-between items-center">
                <div>
                    <h3 class="font-semibold">{{ $board->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $board->pins_count }} pins</p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('boards.edit', $board) }}" class="px-3 py-1 bg-yellow-400 rounded">Edit</a>
                    <form method="POST" action="{{ route('boards.destroy', $board) }}">
                        @csrf @method('DELETE')
                        <button class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        {{ $boards->links() }}
    </div>
</x-app-layout>
