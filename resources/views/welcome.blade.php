<x-guest-layout>

    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('landing') }}" class="text-xl font-bold">Pinspire</a>

        <div class="flex gap-2">
            @auth
                <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded bg-gray-900 text-white">
                    Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-4 py-2 rounded border">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 rounded border">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 rounded bg-red-500 text-white">
                    Register
                </a>
            @endauth
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <form method="GET" class="mb-6">
            <input type="text" name="q" value="{{ $q }}" placeholder="Search pins..."
                class="w-full rounded-lg border-gray-300 focus:ring focus:ring-red-200">
        </form>

        <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
            @foreach ($pins as $pin)
                <div class="break-inside-avoid rounded-xl overflow-hidden bg-white shadow">
                    <img src="{{ asset('storage/' . $pin->image) }}" alt="{{ $pin->title }}" class="w-full">
                    <div class="p-3">
                        <h3 class="font-semibold">{{ $pin->title }}</h3>
                        <p class="text-sm text-gray-600">{{ Str::limit($pin->description, 80) }}</p>
                        <p class="text-xs text-gray-500 mt-2">By {{ $pin->user->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">{{ $pins->links() }}</div>
    </div>
</x-guest-layout>
