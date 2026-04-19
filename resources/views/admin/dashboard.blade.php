<x-app-layout>
    <div class="max-w-6xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
        <div class="grid md:grid-cols-3 gap-4">
            <div class="bg-white shadow rounded p-6">Users: <strong>{{ $totalUsers }}</strong></div>
            <div class="bg-white shadow rounded p-6">Pins: <strong>{{ $totalPins }}</strong></div>
            <div class="bg-white shadow rounded p-6">Boards: <strong>{{ $totalBoards }}</strong></div>
        </div>
    </div>
</x-app-layout>
