<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinspire Feed</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#fdeae7] min-h-screen font-sans text-gray-900">

    <!-- Top Navigation Bar -->
    <nav class="fixed top-0 w-full bg-white/90 backdrop-blur-md z-50 px-4 py-3 flex items-center justify-between gap-4">
        <!-- Logo & Main Links -->
        <div class="flex items-center gap-2">
            <a href="{{ route('dashboard') }}"
                class="p-3 bg-[#fdeae7] text-red-500 rounded-full hover:bg-red-50 transition">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.91 2.168-2.91 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.951-7.252 4.184 0 7.436 2.981 7.436 6.958 0 4.156-2.615 7.502-6.248 7.502-1.222 0-2.373-.635-2.768-1.385l-.754 2.877c-.273 1.042-1.012 2.348-1.506 3.143A11.966 11.966 0 0012 24c6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z" />
                </svg>
            </a>
            <a href="{{ route('dashboard') }}"
                class="hidden md:block px-4 py-3 bg-gray-900 text-white font-semibold rounded-full hover:bg-gray-800">Home</a>

            <!-- Check if the authenticated user is an admin before showing the button -->
            @if(Auth::check() && Auth::user()->is_admin)
                <a href="{{ route('admin.dashboard') }}"
                    class="hidden md:block px-4 py-3 bg-gray-900 text-white font-semibold rounded-full hover:bg-gray-800">Admin Dashboard</a>
            @endif
        </div>

        <!-- Search Bar -->
        <div class="flex-grow max-w-5xl">
            <!-- Wrapped in a GET form pointing to the dashboard -->
            <form action="{{ route('dashboard') }}" method="GET" class="relative w-full">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search for ideas..."
                    class="w-full pl-12 pr-4 py-3 bg-gray-100 hover:bg-gray-200 border-transparent focus:bg-white focus:border-red-500 focus:ring-4 focus:ring-red-100 rounded-full text-base transition outline-none">
            </form>
        </div>

        <!-- Right Icons & Profile -->
        <div class="flex items-center gap-1 md:gap-3">
            <a href="{{ route('profile.edit') }}" class="ml-2 block">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=fdeae7&color=ef4444"
                    alt="Profile" class="h-10 w-10 rounded-full hover:scale-105 transition">
            </a>

            <form method="POST" action="{{ route('logout') }}" class="hidden md:block">
                @csrf
                <button type="submit" class="p-2 text-gray-500 hover:bg-gray-100 rounded-full transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </nav>

    <!-- Main Masonry Grid -->
    <main id="home" class="pt-24 pb-10 px-4 max-w-[1600px] mx-auto">
        <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 2xl:columns-6 gap-4 space-y-4">

            @forelse ($pins as $pin)
                @php
                    $imgSrc = str_starts_with($pin->image, 'http') ? $pin->image : asset('storage/' . $pin->image);
                @endphp

                <!-- Added onclick to trigger the modal -->
                <div class="relative group break-inside-avoid rounded-2xl overflow-hidden cursor-zoom-in"
                     onclick="openPinModal('{{ $imgSrc }}', '{{ addslashes($pin->title) }}', '{{ $pin->id }}')">

                    <img src="{{ $imgSrc }}" class="w-full object-cover rounded-2xl" alt="{{ $pin->title }}">

                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex flex-col justify-between p-3 rounded-2xl pointer-events-none">

                        <div class="flex justify-end">
                            <span class="bg-[#e60023] text-white font-bold py-3 px-5 rounded-full shadow-md">
                                View
                            </span>
                        </div>

                        <!-- Title / Details -->
                        <div class="flex justify-between items-center opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                            @if ($pin->title)
                                <span class="bg-white/90 text-gray-900 text-sm font-semibold py-2 px-3 rounded-full truncate max-w-[80%]">
                                    {{ $pin->title }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <h2 class="text-2xl font-bold text-gray-400">No pins yet!</h2>
                    <p class="text-gray-500 mt-2">Wait for the admin to add some inspiration.</p>
                </div>
            @endforelse
        </div>
    </main>

    <!-- Overlay Pin Modal -->
    <div id="pinModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/80 backdrop-blur-sm opacity-0 transition-opacity duration-300 p-4" onclick="closePinModal(event)">
        <!-- Modal Container -->
        <div id="pinModalContent" class="relative max-w-4xl w-auto rounded-[2rem] overflow-hidden shadow-2xl transform scale-95 opacity-0 transition-all duration-300 flex justify-center bg-black/50" onclick="event.stopPropagation()">

            <!-- The Image -->
            <img id="modalImage" src="" alt="Pin Image" class="w-full h-auto max-h-[90vh] object-contain">

            <!-- Close Button -->
            <button onclick="closePinModal()" class="absolute top-4 right-4 z-20 p-2.5 bg-black/40 hover:bg-black/60 rounded-full text-white transition backdrop-blur-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <!-- Bottom Gradient Overlay (Label & Download Button) -->
            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-6 md:p-8 flex flex-col sm:flex-row items-start sm:items-end justify-between gap-4 pointer-events-none">

                <!-- Title -->
                <h2 id="modalTitle" class="text-2xl md:text-3xl font-bold text-white tracking-tight leading-tight max-w-[70%] drop-shadow-md"></h2>

                <!-- Download Button (Uses pointer-events-auto so it can be clicked) -->
                <button id="modalDownloadBtn" class="pointer-events-auto bg-[#e60023] hover:bg-[#ad081b] text-white font-bold py-3 px-6 rounded-full transition transform hover:scale-105 shadow-lg flex items-center justify-center gap-2 text-sm sm:text-base shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Save Image
                </button>

            </div>
        </div>
    </div>

    <!-- JavaScript to Handle Modal and Server-Side Download -->
    <script>
        const pinModal = document.getElementById('pinModal');
        const pinModalContent = document.getElementById('pinModalContent');
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const modalDownloadBtn = document.getElementById('modalDownloadBtn');

        function openPinModal(imgSrc, title, pinId) {
            modalImage.src = imgSrc;
            modalTitle.innerText = title || 'Untitled Pin';

            // Redirect to our new server-side download route instead of using JS fetch!
            modalDownloadBtn.onclick = function() {
                window.location.href = `/download-image?url=${encodeURIComponent(imgSrc)}&name=pinspire-${pinId}.jpg`;
            };

            pinModal.classList.remove('hidden');
            pinModal.classList.add('flex');

            setTimeout(() => {
                pinModal.classList.remove('opacity-0');
                pinModalContent.classList.remove('scale-95', 'opacity-0');
                pinModalContent.classList.add('scale-100', 'opacity-100');
            }, 10);

            document.body.style.overflow = 'hidden';
        }

        function closePinModal(event = null) {
            if (event && event.target !== pinModal && !event.target.closest('button')) {
                return;
            }

            pinModal.classList.add('opacity-0');
            pinModalContent.classList.remove('scale-100', 'opacity-100');
            pinModalContent.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                pinModal.classList.add('hidden');
                pinModal.classList.remove('flex');
                document.body.style.overflow = 'auto';
                modalImage.src = '';
                modalTitle.innerText = '';
            }, 300);
        }
    </script>
</body>

</html>
