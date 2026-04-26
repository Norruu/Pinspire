<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinspire Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans text-gray-900 flex min-h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between shrink-0">
        <div>
            <!-- Admin Branding -->
            <div class="h-16 flex items-center px-6 border-gray-200">
                <h1 class="text-red-500 font-black text-xl tracking-tight flex items-center gap-2">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.91 2.168-2.91 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.951-7.252 4.184 0 7.436 2.981 7.436 6.958 0 4.156-2.615 7.502-6.248 7.502-1.222 0-2.373-.635-2.768-1.385l-.754 2.877c-.273 1.042-1.012 2.348-1.506 3.143A11.966 11.966 0 0012 24c6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z"/></svg>
                    Admin Panel
                </h1>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1">
                <!-- Dashboard Tab -->
                <a href="#" id="btn-dashboard" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Dashboard
                </a>
                <!-- Users Tab -->
                <a href="#" id="btn-users" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Manage Users
                </a>
                <!-- Pins Tab -->
                <a href="#" id="btn-pins" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Manage Pins
                </a>
            </nav>
        </div>

        <!-- Logout / Profile -->
        <div class="p-4 border-gray-200">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to App
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden bg-[#fdeae7]">

        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 shrink-0">
            <h2 id="header-title" class="text-xl font-bold text-gray-800">Admin Dashboard</h2>
            <div class="flex items-center gap-4">
                <span class="text-sm font-medium text-gray-500">Welcome, {{ Auth::user()->name ?? 'Admin' }}</span>
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=fdeae7&color=ef4444" alt="Admin Profile" class="h-9 w-9 rounded-full border border-gray-200">
            </div>
        </header>

        <div class="flex-1 overflow-y-auto">
            <div class="min-h-full flex flex-col">
                <div class="flex-1 p-8">

            <!-- Success/Error Alerts (Always visible regardless of tab) -->
            @if(session('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

            <!-- ========================================== -->
            <!-- DASHBOARD SECTION -->
            <!-- ========================================== -->
            <div id="section-dashboard" class="hidden">
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                        <div class="p-3 bg-blue-50 text-blue-500 rounded-xl"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg></div>
                        <div><p class="text-sm font-medium text-gray-500">Total Users</p><h3 class="text-2xl font-bold text-gray-800">{{ $totalUsers }}</h3></div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                        <div class="p-3 bg-red-50 text-red-500 rounded-xl"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                        <div><p class="text-sm font-medium text-gray-500">Total Pins</p><h3 class="text-2xl font-bold text-gray-800">{{ $totalPins }}</h3></div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                        <div class="p-3 bg-green-50 text-green-500 rounded-xl"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></div>
                        <div><p class="text-sm font-medium text-gray-500">Total Boards</p><h3 class="text-2xl font-bold text-gray-800">{{ $totalBoards }}</h3></div>
                    </div>
                </div>

                <!-- Admin Context & Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- What you can do (Capabilities Guide) -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Admin Capabilities Guide</h3>
                        <div class="space-y-6">

                            <div class="flex gap-4 items-start">
                                <div class="p-3 bg-blue-50 text-blue-500 rounded-xl shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-800">User Management</h4>
                                    <p class="text-gray-500 mt-1 leading-relaxed">
                                        Monitor the community. You have the power to <strong>promote</strong> regular users to Admins, or <strong>delete</strong> accounts permanently if they violate community guidelines.
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4 items-start">
                                <div class="p-3 bg-red-50 text-red-500 rounded-xl shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-800">Pin Management</h4>
                                    <p class="text-gray-500 mt-1 leading-relaxed">
                                        Curate the feed. You can <strong>upload</strong> new pins via files or links, <strong>edit</strong> the titles/links of existing pins to fix errors, and <strong>delete</strong> inappropriate images.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Quick Actions Shortcuts -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Quick Actions</h3>
                        <div class="space-y-4">

                            <button onclick="document.getElementById('btn-users').click()" class="w-full text-left flex items-center justify-between p-5 rounded-xl border border-gray-200 hover:border-blue-500 hover:bg-blue-50 hover:shadow-md transition-all group">
                                <div class="flex items-center gap-4">
                                    <span class="p-2 bg-gray-100 text-gray-500 rounded-lg group-hover:bg-blue-100 group-hover:text-blue-600 transition">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                    </span>
                                    <div>
                                        <span class="block font-bold text-gray-800 group-hover:text-blue-700">Review Recent Users</span>
                                        <span class="block text-sm text-gray-500 mt-0.5">Change roles or remove accounts</span>
                                    </div>
                                </div>
                                <svg class="w-6 h-6 text-gray-300 group-hover:text-blue-500 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>

                            <button onclick="document.getElementById('btn-pins').click()" class="w-full text-left flex items-center justify-between p-5 rounded-xl border border-gray-200 hover:border-red-500 hover:bg-red-50 hover:shadow-md transition-all group">
                                <div class="flex items-center gap-4">
                                    <span class="p-2 bg-gray-100 text-gray-500 rounded-lg group-hover:bg-red-100 group-hover:text-red-600 transition">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                    </span>
                                    <div>
                                        <span class="block font-bold text-gray-800 group-hover:text-red-700">Upload a New Pin</span>
                                        <span class="block text-sm text-gray-500 mt-0.5">Add an image via file or URL</span>
                                    </div>
                                </div>
                                <svg class="w-6 h-6 text-gray-300 group-hover:text-red-500 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- USERS SECTION -->
            <!-- ========================================== -->
            <div id="section-users" class="hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gray-50/50">
                        <h3 class="text-lg font-bold text-gray-800">Manage Users</h3>
                        <!-- NEW: Users Search Bar -->
                        <div class="relative w-full sm:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text" id="userSearch" placeholder="Search name or email..."
                                class="block w-full pl-9 pr-3 py-2 border border-gray-200 rounded-full leading-5 bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 text-sm transition shadow-sm">
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse" id="usersTable">
                            <thead>
                                <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                    <th class="px-6 py-3 font-medium">User</th>
                                    <th class="px-6 py-3 font-medium">Email</th>
                                    <th class="px-6 py-3 font-medium">Joined Date</th>
                                    <th class="px-6 py-3 font-medium">Role</th>
                                    <th class="px-6 py-3 font-medium text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm">
                                @forelse ($recentUsers as $user)
                                    <tr class="hover:bg-gray-50 transition user-row">
                                        <td class="px-6 py-4 flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" class="w-8 h-8 rounded-full">
                                            <span class="font-semibold text-gray-800 user-name">{{ $user->name }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500 user-email">{{ $user->email }}</td>
                                        <td class="px-6 py-4 text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('admin.users.role', $user) }}" method="POST">
                                                @csrf @method('PATCH')
                                                @if($user->is_admin)
                                                    <button type="submit" onclick="return confirm('Remove admin rights?')" class="px-3 py-1 bg-purple-100 hover:bg-purple-200 text-purple-700 rounded-full text-xs font-bold transition shadow-sm">Admin</button>
                                                @else
                                                    <button type="submit" onclick="return confirm('Grant admin rights?')" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-xs font-bold transition shadow-sm">User</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            @if($user->id !== Auth::id())
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block">
                                                @csrf @method('DELETE')
                                                <button type="button" onclick="openDeleteModal(this.closest('form'), 'Delete User', 'Are you sure you want to permanently delete {{ addslashes($user->name) }}? This cannot be undone.')" class="text-red-400 hover:text-red-600 transition font-bold">Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="empty-state-row">
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">No users found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- PINS SECTION -->
            <!-- ========================================== -->
            <div id="section-pins" class="hidden">
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                    <!-- Create New Pin Form -->
                    <div class="xl:col-span-1 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 h-fit">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Add New Pin</h3>
                        <form action="{{ route('admin.pins.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                <input type="text" name="title" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm" placeholder="Pin Title">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Option 1: Upload from Laptop</label>
                                <input type="file" name="image_upload" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                            </div>

                            <div class="relative flex items-center py-2">
                                <div class="flex-grow border-t border-gray-200"></div>
                                <span class="flex-shrink-0 mx-4 text-gray-400 text-xs font-semibold uppercase">OR</span>
                                <div class="flex-grow border-t border-gray-200"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Option 2: Paste Image Link</label>
                                <input type="url" name="image_link" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm" placeholder="https://example.com/image.jpg">
                            </div>

                            <button type="submit" class="w-full bg-[#e60023] hover:bg-[#ad081b] text-white font-bold py-2.5 rounded-full transition mt-2 shadow-md">
                                Create Pin
                            </button>
                        </form>
                    </div>

                    <!-- Recent Pins Table -->
                    <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                        <!-- NEW: Pins Search Bar -->
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <h3 class="text-lg font-bold text-gray-800">Manage Recent Pins</h3>
                            <div class="relative w-full sm:w-64">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <input type="text" id="pinSearch" placeholder="Search by title..."
                                    class="block w-full pl-9 pr-3 py-2 border border-gray-200 rounded-full leading-5 bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 text-sm transition shadow-sm">
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse" id="pinsTable">
                                <thead>
                                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                        <th class="px-6 py-3 font-medium">Pin Preview</th>
                                        <th class="px-6 py-3 font-medium w-1/2">Edit Details</th>
                                        <th class="px-6 py-3 font-medium text-right">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-sm">
                                    @forelse ($recentPins as $pin)
                                        <tr class="hover:bg-gray-50 transition group pin-row">
                                            <!-- Image Preview -->
                                            <td class="px-6 py-4">
                                                <div class="w-20 h-20 rounded-xl overflow-hidden border border-gray-200 bg-gray-100 shadow-sm">
                                                    @php
                                                        $imgSrc = str_starts_with($pin->image, 'http') ? $pin->image : asset('storage/' . $pin->image);
                                                    @endphp
                                                    <img src="{{ $imgSrc }}" class="w-full h-full object-cover">
                                                </div>
                                            </td>

                                            <!-- Edit Inline Form -->
                                            <td class="px-6 py-4">
                                                <form id="edit-pin-{{ $pin->id }}" action="{{ route('admin.pins.update', $pin) }}" method="POST" enctype="multipart/form-data" class="space-y-2">
                                                    @csrf @method('PATCH')

                                                    <input type="text" name="title" value="{{ $pin->title }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm px-3 py-1.5 pin-title-input" placeholder="Title">

                                                    <input type="url" name="image_link" value="{{ str_starts_with($pin->image, 'http') ? $pin->image : '' }}" class="w-full rounded-md border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-xs px-2 py-1.5" placeholder="Paste new image URL">

                                                    <div class="flex items-center gap-2 mb-2">
                                                        <div class="flex-grow border-t border-gray-100"></div>
                                                        <span class="text-[10px] font-black text-gray-300 uppercase tracking-widest">OR FILE</span>
                                                        <div class="flex-grow border-t border-gray-100"></div>
                                                    </div>

                                                    <input type="file" name="image_upload" accept="image/*" class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mb-2 cursor-pointer">
                                                </form>
                                            </td>

                                            <!-- Actions (Save & Delete next to each other!) -->
                                            <td class="px-6 py-4 text-right">
                                                <div class="flex items-center justify-end gap-4">
                                                    <!-- Save Button (linked to the form via the form="" attribute) -->
                                                    <button type="submit" form="edit-pin-{{ $pin->id }}" class="text-blue-500 hover:text-blue-700 transition font-bold">Save</button>

                                                    <!-- Delete Form -->
                                                    <form action="{{ route('admin.pins.destroy', $pin) }}" method="POST">
                                                        @csrf @method('DELETE')
                                                        <button type="button" onclick="openDeleteModal(this.closest('form'), 'Delete Pin', 'Are you sure you want to permanently delete this pin?')" class="text-red-400 hover:text-red-600 transition font-bold">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="empty-state-row">
                                            <td colspan="3" class="px-6 py-8 text-center text-gray-500">No pins created yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            </div>
             <footer class="bg-[#fdeae7] border-gray-200 py-8 shrink-0">
                    <div class="max-w-7xl mx-auto px-6 text-center">
                        <p class="text-gray-400 text-sm font-medium">&copy; {{ date('Y') }} Pinspire. All rights reserved.</p>
                    </div>
                </footer>
            </div>
        </div>
    </main>

        <!-- Custom Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-gray-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300">
        <div id="deleteModalCard" class="bg-white rounded-[2rem] shadow-2xl w-full max-w-sm mx-4 p-8 transform scale-95 opacity-0 transition-all duration-300">
            <!-- Warning Icon -->
            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-red-50 text-red-500 mx-auto mb-6">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>

            <h3 class="text-2xl font-black text-center text-gray-900 mb-2" id="deleteModalTitle">Delete Item?</h3>
            <p class="text-center text-gray-500 mb-8" id="deleteModalMessage">Are you sure you want to delete this?</p>

            <div class="flex gap-4">
                <button type="button" onclick="closeDeleteModal()" class="flex-1 px-5 py-3.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-full transition">
                    Cancel
                </button>
                <button type="button" id="confirmDeleteBtn" class="flex-1 px-5 py-3.5 bg-[#e60023] hover:bg-[#ad081b] text-white font-bold rounded-full transition shadow-md">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <!-- Vanilla JS to Handle Tab Switching and Search Filters -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- Tab Switching Logic ---
            const buttons = {
                'dashboard': document.getElementById('btn-dashboard'),
                'users': document.getElementById('btn-users'),
                'pins': document.getElementById('btn-pins')
            };

            const sections = {
                'dashboard': document.getElementById('section-dashboard'),
                'users': document.getElementById('section-users'),
                'pins': document.getElementById('section-pins')
            };

            const titles = {
                'dashboard': 'Admin Dashboard',
                'users': 'Manage Users',
                'pins': 'Manage Pins'
            };

            const activeBtnClasses = ['bg-[#fdeae7]', 'text-red-600', 'font-semibold'];
            const inactiveBtnClasses = ['text-gray-500', 'hover:bg-gray-50', 'hover:text-gray-900', 'font-medium'];

            function switchTab(tabId) {
                sessionStorage.setItem('adminActiveTab', tabId);
                document.getElementById('header-title').innerText = titles[tabId];

                Object.keys(sections).forEach(key => {
                    sections[key].classList.add('hidden');
                    buttons[key].classList.remove(...activeBtnClasses);
                    buttons[key].classList.add(...inactiveBtnClasses);
                });

                sections[tabId].classList.remove('hidden');
                buttons[tabId].classList.remove(...inactiveBtnClasses);
                buttons[tabId].classList.add(...activeBtnClasses);
            }

            Object.keys(buttons).forEach(key => {
                buttons[key].addEventListener('click', (e) => {
                    e.preventDefault();
                    switchTab(key);
                });
            });

            const activeTab = sessionStorage.getItem('adminActiveTab') || 'dashboard';
            switchTab(activeTab);

            // --- User Search Filter Logic ---
            const userSearchInput = document.getElementById('userSearch');
            if (userSearchInput) {
                userSearchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const rows = document.querySelectorAll('#usersTable tbody tr.user-row');

                    rows.forEach(row => {
                        const name = row.querySelector('.user-name').textContent.toLowerCase();
                        const email = row.querySelector('.user-email').textContent.toLowerCase();

                        if (name.includes(searchTerm) || email.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }

            // --- Pin Search Filter Logic ---
            const pinSearchInput = document.getElementById('pinSearch');
            if (pinSearchInput) {
                pinSearchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const rows = document.querySelectorAll('#pinsTable tbody tr.pin-row');

                    rows.forEach(row => {
                        const titleInput = row.querySelector('.pin-title-input');
                        if (titleInput) {
                            const title = titleInput.value.toLowerCase();
                            if (title.includes(searchTerm)) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                        }
                    });
                });
            }

                    // --- Custom Delete Modal Logic ---
        let deleteFormToSubmit = null;
        const deleteModal = document.getElementById('deleteModal');
        const deleteModalCard = document.getElementById('deleteModalCard');

        window.openDeleteModal = function(form, title, message) {
            deleteFormToSubmit = form;
            document.getElementById('deleteModalTitle').innerText = title;
            document.getElementById('deleteModalMessage').innerText = message;

            // Show modal
            deleteModal.classList.remove('hidden');
            deleteModal.classList.add('flex');

            // Trigger animations
            setTimeout(() => {
                deleteModal.classList.remove('opacity-0');
                deleteModalCard.classList.remove('scale-95', 'opacity-0');
                deleteModalCard.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        window.closeDeleteModal = function() {
            deleteFormToSubmit = null;

            // Revert animations
            deleteModal.classList.add('opacity-0');
            deleteModalCard.classList.remove('scale-100', 'opacity-100');
            deleteModalCard.classList.add('scale-95', 'opacity-0');

            // Hide modal after animation finishes
            setTimeout(() => {
                deleteModal.classList.add('hidden');
                deleteModal.classList.remove('flex');
            }, 300);
        }

        // Handle actual deletion
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        if (confirmDeleteBtn) {
            confirmDeleteBtn.addEventListener('click', () => {
                if (deleteFormToSubmit) {
                    deleteFormToSubmit.submit();
                }
            });
        }
        });
    </script>
</body>
</html>
