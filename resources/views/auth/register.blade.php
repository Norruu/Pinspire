<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinspire Sign Up</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fdeae7] min-h-screen flex items-center justify-center p-4 font-sans">

    <!-- Main Card Container -->
    <div class="bg-white rounded-[2rem] shadow-xl w-full max-w-4xl flex flex-col md:flex-row relative overflow-hidden">

        <!-- Close Button (Top Right) -->
        {{-- <button class="absolute top-6 right-6 text-gray-500 hover:text-gray-800 transition z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button> --}}

        <!-- Left Side Illustration Panel -->
        <div class="hidden md:block w-1/2 p-3">
            <div class="bg-[#fdeae7] h-full rounded-[1.5rem] flex flex-col justify-between relative overflow-hidden">
                <!-- Branding -->
                <div class="p-6">
                    <h1 class="text-red-500 font-black text-xl tracking-tight">Pinspire.</h1>
                </div>
                <!-- Illustration -->
                <div class="flex-grow flex items-center justify-center relative">
                    <img src="{{ asset('images/Illustration.png') }}" alt="Illustration" class="object-cover w-full h-full rounded-b-[1.5rem]">
                </div>
            </div>
        </div>

        <!-- Right Side Form Panel -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">

            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Sign Up</h2>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <!-- User Icon -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="text" id="name" name="name" placeholder="Juan"
                            class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition shadow-sm" required autofocus>
                    </div>
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <!-- Mail Icon -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" placeholder="example@gmail.com"
                            class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition shadow-sm" required>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center z-10">
                            <!-- Lock Icon -->
                            <svg id="lock-icon" class="h-5 w-5 text-gray-400 transition-opacity duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <!-- Eye Icon -->
                            <svg id="eye-icon" class="h-5 w-5 text-gray-400 cursor-pointer hidden transition-opacity duration-200 hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" placeholder="********"
                            class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition shadow-sm relative z-0" required>
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center z-10">
                            <!-- Lock Icon -->
                            <svg id="lock-icon-confirm" class="h-5 w-5 text-gray-400 transition-opacity duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <!-- Eye Icon -->
                            <svg id="eye-icon-confirm" class="h-5 w-5 text-gray-400 cursor-pointer hidden transition-opacity duration-200 hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="********"
                            class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition shadow-sm relative z-0" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-[#f67280] hover:bg-[#e05b69] text-white font-bold py-3.5 px-4 rounded-xl transition duration-200 shadow-md">
                    Create Account
                </button>
            </form>

            <!-- Footer Link -->
            <p class="text-center text-sm text-gray-600 font-medium mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="text-gray-500 font-semibold hover:underline">Log In here</a>
            </p>

        </div>
    </div>

    <!-- Password Icon Logic for Both Fields -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Reusable function to handle the lock/eye toggle
            function setupPasswordToggle(inputId, lockId, eyeId) {
                const input = document.getElementById(inputId);
                const lockIcon = document.getElementById(lockId);
                const eyeIcon = document.getElementById(eyeId);

                if (!input) return;

                // Listen for typing
                input.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        lockIcon.classList.add('hidden');
                        eyeIcon.classList.remove('hidden');
                    } else {
                        lockIcon.classList.remove('hidden');
                        eyeIcon.classList.add('hidden');
                        input.type = 'password';
                        eyeIcon.classList.remove('text-yellow-500');
                    }
                });

                // Listen for clicking the eye
                eyeIcon.addEventListener('click', function() {
                    if (input.type === 'password') {
                        input.type = 'text';
                        eyeIcon.classList.add('text-yellow-500');
                    } else {
                        input.type = 'password';
                        eyeIcon.classList.remove('text-yellow-500');
                    }
                });
            }

            // Initialize for the main password field
            setupPasswordToggle('password', 'lock-icon', 'eye-icon');

            // Initialize for the confirm password field
            setupPasswordToggle('password_confirmation', 'lock-icon-confirm', 'eye-icon-confirm');
        });
    </script>
</body>
</html>
