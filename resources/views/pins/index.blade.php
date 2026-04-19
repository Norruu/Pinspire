<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">My Pins</h1>
            <a href="{{ route('pins.create') }}" class="bg-red-500 text-white px-4 py-2 rounded">Create Pin</a>
        </div>

        <div class="grid md:grid-cols-3 gap-4">
            @foreach($pins as $pin)
                <div class="bg-white rounded shadow overflow-hidden">
                    <img src="{{ asset('storage/'.$pin->image) }}" class="w-full h-60 object-cover">
                    <div class="p-3">
                        <h3 class="font-semibold">{{ $pin->title }}</h3>
                        <div class="mt-3 flex gap-2">
                            <a href="{{ route('pins.edit', $pin) }}" class="px-3 py-1 bg-yellow-400 rounded">Edit</a>
                            <form method="POST" action="{{ route('pins.destroy', $pin) }}">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">{{ $pins->links() }}</div>
    </div>
</x-app-layout>
