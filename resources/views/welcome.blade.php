<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pinspire - Get your next idea</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fdeae7] font-sans antialiased text-gray-900 overflow-x-hidden relative">

    <!-- Top Navigation -->
    <nav class="sticky absolute top-0 w-full z-50 px-6 py-4 flex items-center justify-between bg-white/80 backdrop-blur-md">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <div class="p-2 bg-[#fdeae7] text-red-500 rounded-full">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.91 2.168-2.91 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.951-7.252 4.184 0 7.436 2.981 7.436 6.958 0 4.156-2.615 7.502-6.248 7.502-1.222 0-2.373-.635-2.768-1.385l-.754 2.877c-.273 1.042-1.012 2.348-1.506 3.143A11.966 11.966 0 0012 24c6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z"/></svg>
            </div>
            <span class="text-red-500 font-black text-2xl tracking-tight hidden sm:block">Pinspire</span>
        </div>

        <!-- Auth Links -->
        <div class="flex items-center gap-2 sm:gap-4 font-semibold">
            <!-- Linked to the About Section below -->
            <a href="#home" class="hidden md:block text-gray-700 hover:text-black px-3 py-2 transition">Home</a>
            <a href="#about" class="hidden md:block text-gray-700 hover:text-black px-3 py-2 transition">About</a>
            <a href="#team" class="hidden md:block text-gray-700 hover:text-black px-3 py-2 transition">Team</a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-900 px-5 py-2.5 rounded-full transition ml-2">Go to Feed</a>
                @else
                    <a href="{{ route('login') }}" class="bg-[#e60023] hover:bg-[#ad081b] text-white px-5 py-2.5 rounded-full transition ml-2">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-900 px-5 py-2.5 rounded-full transition">Sign up</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <header id="home" class="pt-40 pb-16 px-4 text-center">
        <h1 class="text-5xl sm:text-6xl md:text-7xl font-black tracking-tight mb-6 transition-all duration-500">
            Get your next <br class="md:hidden">
            <!-- Added an ID to target the text -->
            <span id="hero-text" class="text-green-600 block mt-2 transition-colors duration-500">home decor idea</span>
        </h1>
        <!-- Animated dots indicator -->
        <div id="hero-dots" class="flex justify-center gap-3 mt-8 mb-12">
            <!-- Dots will be updated by JS -->
            <div class="w-3 h-3 rounded-full bg-green-600 transition-colors duration-500"></div>
            <div class="w-3 h-3 rounded-full bg-gray-300 transition-colors duration-500"></div>
            <div class="w-3 h-3 rounded-full bg-gray-300 transition-colors duration-500"></div>
            <div class="w-3 h-3 rounded-full bg-gray-300 transition-colors duration-500"></div>
        </div>
    </header>

    <!-- Background Masonry Grid (Functional) -->
    <section class="relative max-w-[1600px] mx-auto px-4 h-[600px] overflow-hidden">
        <!-- Gradient overlay to fade the bottom to white -->
        <div class="absolute inset-x-0 bottom-0 h-64 bg-gradient-to-t from-white via-white/80 to-transparent z-10"></div>

        <!-- The Grid (Added an ID here) -->
        <div id="hero-grid" class="columns-2 md:columns-4 lg:columns-6 gap-4 space-y-4 opacity-80 pointer-events-none transition-opacity duration-700">
            <!-- 9 Image containers. We gave each img a class 'grid-img' so JS can swap the src -->
            <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-sm">
                <img class="grid-img w-full object-cover transition-all duration-700" src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=400&h=600&fit=crop">
            </div>
            <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-sm">
                <img class="grid-img w-full object-cover transition-all duration-700" src="https://images.unsplash.com/photo-1556020685-e631933f1107?w=400&h=400&fit=crop">
            </div>
            <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-sm">
                <img class="grid-img w-full object-cover transition-all duration-700" src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=400&h=700&fit=crop">
            </div>
            <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-sm">
                <img class="grid-img w-full object-cover transition-all duration-700" src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=500&fit=crop">
            </div>
            <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-sm">
                <img class="grid-img w-full object-cover transition-all duration-700" src="https://images.unsplash.com/photo-1598928506311-c55dd1040854?w=400&h=800&fit=crop">
            </div>
            <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-sm hidden md:block">
                <img class="grid-img w-full object-cover transition-all duration-700" src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=400&h=450&fit=crop">
            </div>
            <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-sm hidden md:block">
                <img class="grid-img w-full object-cover transition-all duration-700" src="https://images.unsplash.com/photo-1505691938895-1758d7bef511?w=400&h=600&fit=crop">
            </div>
            <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-sm hidden lg:block">
                <img class="grid-img w-full object-cover transition-all duration-700" src="https://images.unsplash.com/photo-1600121848594-d8644e57abab?w=400&h=500&fit=crop">
            </div>
            <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-sm hidden lg:block">
                <img class="grid-img w-full object-cover transition-all duration-700" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400&h=700&fit=crop">
            </div>
        </div>

        <!-- Floating Sign up CTA over the fade -->
        <div class="absolute bottom-16 left-0 right-0 z-20 flex justify-center">
            @if (!Auth::check())
                <a href="{{ route('register') }}" class="bg-[#e60023] hover:bg-[#ad081b] text-white font-bold text-lg px-8 py-4 rounded-full shadow-lg transition transform hover:scale-105">
                    Sign up to see more
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="bg-[#e60023] hover:bg-[#ad081b] text-white font-bold text-lg px-8 py-4 rounded-full shadow-lg transition transform hover:scale-105">
                    Continue to Feed
                </a>
            @endif
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <!-- Text Content -->
                <div class="order-2 lg:order-1">
                    <h2 class="text-4xl md:text-5xl font-black tracking-tight mb-6 text-gray-900">What is Pinspire?</h2>
                    <p class="text-xl text-gray-600 mb-6 leading-relaxed">
                        Pinspire is your visual discovery engine for finding recipes, home and style inspiration, and more.
                        With billions of Pins to explore, you'll always find ideas to spark your creativity.
                    </p>
                    <p class="text-lg text-gray-500 mb-10 leading-relaxed">
                        When you discover Pins you love, save them to boards to keep your ideas organized and easy to find.
                        You can also create Pins to share your own ideas with other people around the world.
                    </p>

                    <!-- Stats / Features -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="bg-[#fdeae7] p-6 rounded-3xl text-center flex-1">
                            <h4 class="text-3xl font-black text-red-500 mb-1">1M+</h4>
                            <p class="text-sm font-semibold text-gray-700">Active Creators</p>
                        </div>
                        <div class="bg-[#fdeae7] p-6 rounded-3xl text-center flex-1">
                            <h4 class="text-3xl font-black text-red-500 mb-1">50M+</h4>
                            <p class="text-sm font-semibold text-gray-700">Ideas Saved</p>
                        </div>
                    </div>
                </div>

                <!-- Visual Content -->
                <div class="relative order-1 lg:order-2">
                    <!-- Background blob to make the images pop -->
                    <div class="absolute -z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-red-100 rounded-full blur-3xl opacity-60"></div>

                    <!-- Image Collage -->
                    <div class="grid grid-cols-2 gap-4">
                        <img src="https://images.unsplash.com/photo-1493666438817-866a91353ca9?w=500&h=700&fit=crop" alt="Inspiration" class="rounded-3xl w-full h-72 md:h-80 object-cover transform translate-y-8 shadow-xl border-4 border-white">
                        <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?w=500&h=700&fit=crop" alt="Home Decor" class="rounded-3xl w-full h-72 md:h-80 object-cover shadow-xl border-4 border-white">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Meet the Team Section -->
    <section id="team" class="py-24 bg-gray-50 relative">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-black tracking-tight mb-6 text-gray-900">Meet the Team</h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    We are a passionate group of designers, developers, and creators dedicated to building the best visual discovery engine for your next big idea.
                </p>
            </div>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

                <!-- Team Member 1 -->
                <div class="bg-white rounded-[2rem] p-8 text-center shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <img src="https://ui-avatars.com/api/?name=Ryan+Jay&background=fdeae7&color=ef4444&size=200" alt="Daniel Fisher" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover border-4 border-[#fdeae7]">
                    <h3 class="text-2xl font-bold text-gray-900">Ryan Jay Madayag</h3>
                    <p class="text-red-500 font-semibold mb-4">Founder & Lead Developer</p>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Daniel created Pinspire with a vision to make finding inspiration easier, faster, and more beautiful for everyone.
                    </p>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white rounded-[2rem] p-8 text-center shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <img src="https://ui-avatars.com/api/?name=Robel+Andrew&background=fdeae7&color=ef4444&size=200" alt="Jane Doe" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover border-4 border-[#fdeae7]">
                    <h3 class="text-2xl font-bold text-gray-900">Robel Andrew Ambahan</h3>
                    <p class="text-red-500 font-semibold mb-4">Lead Designer</p>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Jane ensures every pixel on Pinspire is perfect, bringing a minimalist and modern touch to the entire platform.
                    </p>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white rounded-[2rem] p-8 text-center shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <img src="https://ui-avatars.com/api/?name=Jerovi&background=fdeae7&color=ef4444&size=200" alt="John Smith" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover border-4 border-[#fdeae7]">
                    <h3 class="text-2xl font-bold text-gray-900">Jerovi Vargas</h3>
                    <p class="text-red-500 font-semibold mb-4">Assistant Developer</p>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        John keeps the Pinspire community safe, engaged, and ensures that millions of creators can share their best ideas.
                    </p>
                </div>

                <!-- Team Member 4 -->
                <div class="bg-white rounded-[2rem] p-8 text-center shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <img src="https://ui-avatars.com/api/?name=John+Rigo&background=fdeae7&color=ef4444&size=200" alt="John Smith" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover border-4 border-[#fdeae7]">
                    <h3 class="text-2xl font-bold text-gray-900">John Rigo Gulmatico</h3>
                    <p class="text-red-500 font-semibold mb-4">Quality Assurance</p>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        John keeps the Pinspire community safe, engaged, and ensures that millions of creators can share their best ideas.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Simple Footer -->
    <footer class="bg-white border-t border-gray-100 py-8 mt-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-gray-400 text-sm font-medium">&copy; {{ date('Y') }} Pinspire. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Carousel Data Configurations
            const themes = [
                {
                    text: "home decor idea",
                    colorClass: "text-green-600",
                    bgClass: "bg-green-600",
                    images: [
                        "https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=400&h=600&fit=crop",
                        "https://images.unsplash.com/photo-1556020685-e631933f1107?w=400&h=400&fit=crop",
                        "https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=400&h=700&fit=crop",
                        "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=500&fit=crop",
                        "https://images.unsplash.com/photo-1598928506311-c55dd1040854?w=400&h=800&fit=crop",
                        "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=400&h=450&fit=crop",
                        "https://images.unsplash.com/photo-1505691938895-1758d7bef511?w=400&h=600&fit=crop",
                        "https://images.unsplash.com/photo-1600121848594-d8644e57abab?w=400&h=500&fit=crop",
                        "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400&h=700&fit=crop"
                    ]
                },
                {
                    text: "weeknight dinner idea",
                    colorClass: "text-yellow-500",
                    bgClass: "bg-yellow-500",
                    images: [
                        "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&h=600&fit=crop",
                        "https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400&h=400&fit=crop",
                        "https://images.unsplash.com/photo-1499028344343-cd173ffc68a9?w=400&h=700&fit=crop",
                        "https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?w=400&h=500&fit=crop",
                        "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=400&h=800&fit=crop",
                        "https://images.unsplash.com/photo-1473093295043-cdd812d0e601?w=400&h=450&fit=crop",
                        "https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=400&h=600&fit=crop",
                        "https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=400&h=500&fit=crop",
                        "https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400&h=700&fit=crop"
                    ]
                },
                {
                    text: "summer outfit idea",
                    colorClass: "text-blue-500",
                    bgClass: "bg-blue-500",
                    images: [
                        "https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=400&h=600&fit=crop",
                        "https://images.unsplash.com/photo-1434389678369-e84013146b28?w=400&h=400&fit=crop",
                        "https://images.unsplash.com/photo-1529139574466-a303027c1d8b?w=400&h=700&fit=crop",
                        "https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?w=400&h=500&fit=crop",
                        "https://images.unsplash.com/photo-1483985988355-763728e1935b?w=400&h=800&fit=crop",
                        "https://images.unsplash.com/photo-1550639525-c97d455acf70?w=400&h=450&fit=crop",
                        "https://images.unsplash.com/photo-1516762689617-e1cffcef479d?w=400&h=600&fit=crop",
                        "https://images.unsplash.com/photo-1485965120184-e220f721d03e?w=400&h=500&fit=crop",
                        "https://images.unsplash.com/photo-1496747611176-843222e1e57c?w=400&h=700&fit=crop"
                    ]
                },
                {
                    text: "DIY project idea",
                    colorClass: "text-red-500",
                    bgClass: "bg-red-500",
                    images: [
                        "https://images.unsplash.com/photo-1452860606245-08befc0ff44b?w=400&h=600&fit=crop",
                        "https://images.unsplash.com/photo-1513519245088-0e12902e5a38?w=400&h=400&fit=crop",
                        "https://images.unsplash.com/photo-1490412210859-994388cc0746?w=400&h=700&fit=crop",
                        "https://images.unsplash.com/photo-1516962215378-7fa2e137ae93?w=400&h=500&fit=crop",
                        "https://images.unsplash.com/photo-1506806732259-39c2d0268443?w=400&h=800&fit=crop",
                        "https://images.unsplash.com/photo-1611078564104-58a558564f9b?w=400&h=450&fit=crop",
                        "https://images.unsplash.com/photo-1584438784894-089d6a62b8fa?w=400&h=600&fit=crop",
                        "https://images.unsplash.com/photo-1533090161767-e6ffed986c88?w=400&h=500&fit=crop",
                        "https://images.unsplash.com/photo-1520699049698-acd2fce18eb4?w=400&h=700&fit=crop"
                    ]
                }
            ];

            let currentIndex = 0;
            const heroText = document.getElementById('hero-text');
            const dots = document.getElementById('hero-dots').children;
            const gridContainer = document.getElementById('hero-grid');
            const images = document.querySelectorAll('.grid-img');

            function updateCarousel() {
                currentIndex = (currentIndex + 1) % themes.length;
                const theme = themes[currentIndex];

                // 1. Update text and color
                heroText.style.opacity = 0; // fade out

                setTimeout(() => {
                    heroText.innerText = theme.text;
                    // Remove all possible colors and add the new one
                    heroText.className = `block mt-2 transition-all duration-500 ${theme.colorClass}`;
                    heroText.style.opacity = 1; // fade in
                }, 300);

                // 2. Update Dots
                Array.from(dots).forEach((dot, index) => {
                    dot.className = `w-3 h-3 rounded-full transition-colors duration-500 ${index === currentIndex ? theme.bgClass : 'bg-gray-300'}`;
                });

                // 3. Update Images (with a slight fade effect)
                gridContainer.style.opacity = 0.4;

                setTimeout(() => {
                    images.forEach((img, index) => {
                        if(theme.images[index]) {
                            img.src = theme.images[index];
                        }
                    });
                    gridContainer.style.opacity = 0.8;
                }, 500);
            }

            // Run the carousel every 4 seconds
            setInterval(updateCarousel, 3000);
        });
    </script>

</body>
</html>
