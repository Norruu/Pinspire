<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pinspire - Get your next idea</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f9fafb] font-sans antialiased text-gray-900 overflow-x-hidden relative">

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

    <!-- New Hero Section -->
    <header id="home" class="pt-32 pb-24 px-4 text-center relative overflow-hidden flex flex-col items-center justify-center min-h-[85vh] bg-[#f9fafb]">

        <!-- Headline -->
        <h1 class="text-6xl sm:text-7xl lg:text-[6rem] font-medium tracking-tight mb-16 text-[#1a1a1a] max-w-4xl mx-auto leading-[1.05] relative z-10">
            A place to display your <br/> masterpiece.
        </h1>
        
        <!-- Floating Badges -->
        <div class="hidden md:flex absolute top-40 left-[15%] lg:left-[22%] bg-[#1d4ed8] text-white px-5 py-2.5 rounded-3xl rounded-bl-sm font-semibold shadow-lg transform -rotate-6 animate-bounce" style="animation-duration: 3s;">
            @Photos
        </div>
        <div class="hidden md:flex absolute top-56 right-[15%] lg:right-[22%] bg-[#10b981] text-white px-5 py-2.5 rounded-3xl rounded-br-sm font-semibold shadow-lg transform rotate-6 animate-bounce" style="animation-duration: 4s;">
            @Design
        </div>

        <!-- Fanned Cards Container -->
        <div class="relative w-full max-w-5xl h-64 md:h-80 mx-auto mb-16 flex justify-center items-center z-0 perspective-1000 mt-8">
            <!-- Card 1 -->
            <div class="absolute w-40 h-48 md:w-56 md:h-64 rounded-2xl overflow-hidden shadow-2xl transform -rotate-[15deg] -translate-x-36 md:-translate-x-56 hover:-translate-y-6 hover:rotate-[-5deg] hover:z-50 transition-all duration-300 border-4 border-white">
                <img src="https://i.pinimg.com/1200x/b6/0b/b2/b60bb2181a89ae957c73f98158566c45.jpg" class="w-full h-full object-cover" alt="Art 1">
            </div>
            <!-- Card 2 -->
            <div class="absolute w-40 h-48 md:w-56 md:h-64 rounded-2xl overflow-hidden shadow-2xl transform -rotate-6 -translate-x-16 md:-translate-x-28 hover:-translate-y-6 hover:rotate-[-2deg] hover:z-50 transition-all duration-300 border-4 border-white z-10 bg-yellow-400">
                <img src="https://i.pinimg.com/736x/2f/dc/15/2fdc1596cfa8c364fd33cb0a93f50175.jpg" class="w-full h-full object-cover mix-blend-multiply opacity-90" alt="Art 2">
            </div>
            <!-- Card 3 -->
            <div class="absolute w-40 h-48 md:w-56 md:h-64 rounded-2xl overflow-hidden shadow-2xl transform rotate-0 hover:-translate-y-6 hover:z-50 transition-all duration-300 border-4 border-white z-20">
                <img src="https://i.pinimg.com/1200x/47/25/b0/4725b0cc75c586bbab9a9af8ff5b9337.jpg" class="w-full h-full object-cover" alt="Art 3">
            </div>
            <!-- Card 4 -->
            <div class="absolute w-40 h-48 md:w-56 md:h-64 rounded-2xl overflow-hidden shadow-2xl transform rotate-6 translate-x-16 md:translate-x-28 hover:-translate-y-6 hover:rotate-[2deg] hover:z-50 transition-all duration-300 border-4 border-white z-30 bg-red-500">
                <img src="https://i.pinimg.com/736x/56/1e/f4/561ef4fe87b674e9a2aa012965c6b44c.jpg" class="w-full h-full object-cover mix-blend-multiply opacity-90" alt="Art 4">
            </div>
            <!-- Card 5 -->
            <div class="absolute w-40 h-48 md:w-56 md:h-64 rounded-2xl overflow-hidden shadow-2xl transform rotate-[15deg] translate-x-36 md:translate-x-56 hover:-translate-y-6 hover:rotate-[5deg] hover:z-50 transition-all duration-300 border-4 border-white z-40 bg-green-600">
                <img src="https://i.pinimg.com/736x/b0/5a/6f/b05a6f927be08df361e226475ed310fa.jpg" class="w-full h-full object-cover mix-blend-multiply opacity-90" alt="Art 5">
            </div>
        </div>

        <!-- Subheadline -->
        <p class="text-base md:text-lg text-gray-700 font-medium mb-10 max-w-2xl mx-auto z-10 relative px-4">
            Artists can display their masterpieces, and buyers can discover and <br class="hidden md:block"/> support amazing talent from around the world.
        </p>
    </header>

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
                            <h4 class="text-3xl font-black text-red-500 mb-1">1+</h4>
                            <p class="text-sm font-semibold text-gray-700">Active Creators</p>
                        </div>
                        <div class="bg-[#fdeae7] p-6 rounded-3xl text-center flex-1">
                            <h4 class="text-3xl font-black text-red-500 mb-1">15+</h4>
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
                        <img src="https://i.pinimg.com/736x/89/fb/65/89fb655f2a04b5d7a33d4aef8683f096.jpg" alt="Inspiration" class="rounded-3xl w-full h-72 md:h-80 object-cover transform translate-y-8 shadow-xl border-4 border-white">
                        <img src="https://i.pinimg.com/736x/66/91/9e/66919ebf625fc5a45a4ad4814c6f9371.jpg" alt="Home Decor" class="rounded-3xl w-full h-72 md:h-80 object-cover shadow-xl border-4 border-white">
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
                        Ryan Jay created Pinspire with a vision to make finding inspiration easier, faster, and more beautiful for everyone.
                    </p>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white rounded-[2rem] p-8 text-center shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <img src="https://ui-avatars.com/api/?name=Robel+Andrew&background=fdeae7&color=ef4444&size=200" alt="Jane Doe" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover border-4 border-[#fdeae7]">
                    <h3 class="text-2xl font-bold text-gray-900">Robel Andrew Ambahan</h3>
                    <p class="text-red-500 font-semibold mb-4">Lead Designer</p>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Robel ensures every pixel on Pinspire is perfect, bringing a minimalist and modern touch to the entire platform.
                    </p>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white rounded-[2rem] p-8 text-center shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <img src="https://ui-avatars.com/api/?name=Jerovi&background=fdeae7&color=ef4444&size=200" alt="John Smith" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover border-4 border-[#fdeae7]">
                    <h3 class="text-2xl font-bold text-gray-900">Jerovi Vargas</h3>
                    <p class="text-red-500 font-semibold mb-4">Assistant Developer</p>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Jerovi keeps the Pinspire community safe, engaged, and ensures that millions of creators can share their best ideas.
                    </p>
                </div>

                <!-- Team Member 4 -->
                <div class="bg-white rounded-[2rem] p-8 text-center shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <img src="https://ui-avatars.com/api/?name=John+Rigo&background=fdeae7&color=ef4444&size=200" alt="John Smith" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover border-4 border-[#fdeae7]">
                    <h3 class="text-2xl font-bold text-gray-900">John Rigo Gulmatico</h3>
                    <p class="text-red-500 font-semibold mb-4">Quality Assurance</p>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        John Rigo keeps the Pinspire community safe, engaged, and ensures that millions of creators can share their best ideas.
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

</body>
</html>
