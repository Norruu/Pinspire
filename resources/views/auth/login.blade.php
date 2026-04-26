<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinspire Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fdeae7] min-h-screen flex items-center justify-center p-4 font-sans">

    <!-- Main Card Container -->
    <div class="bg-white rounded-[2rem] shadow-xl w-full max-w-4xl flex flex-col md:flex-row relative overflow-hidden">

        <!-- Close Button (Top Right) -->
        {{-- <button class="absolute top-6 right-6 text-gray-500 hover:text-gray-800 transition">
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
                <!-- Placeholder for the actual illustration -->
                <div class="flex-grow flex items-center justify-center relative">
                    <img src="{{ asset('images/Illustration.png') }}" alt="Illustration" class="object-cover w-full h-full rounded-b-[1.5rem]">
                </div>
            </div>
        </div>

        <!-- Right Side Form Panel -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">

            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Login</h2>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Email Field -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
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
                <div class="mb-5">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <!-- Icon Container (Pointer Events set to auto so we can click the eye) -->
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center">
                            <!-- Lock Icon (Visible by default) -->
                            <svg id="lock-icon" class="h-5 w-5 text-gray-400 transition-opacity duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>

                            <!-- Eye Icon (Hidden by default, Cursor Pointer for clicking) -->
                            <svg id="eye-icon" class="h-5 w-5 text-gray-400 cursor-pointer hidden transition-opacity duration-200 hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>

                        <input type="password" id="password" name="password" placeholder="********"
                            class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition shadow-sm" required>
                    </div>
                </div>

                <!-- Forgot Password -->
                <div class="flex justify-end mb-6">
                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-yellow-500 hover:text-yellow-600 hover:underline">
                        Forgot Password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-[#f67280] hover:bg-[#e05b69] text-white font-bold py-3.5 px-4 rounded-xl transition duration-200 shadow-md">
                    Log In
                </button>
            </form>

            <!-- Footer Link -->
            <p class="text-center text-sm text-gray-600 font-medium mt-6">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-gray-500 font-semibold hover:underline">Sign Up here</a>
            </p>

        </div>
    </div>

    <!-- Password Icon Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const lockIcon = document.getElementById('lock-icon');
            const eyeIcon = document.getElementById('eye-icon');

            // Listen for typing in the password field
            passwordInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    // Hide lock, show eye
                    lockIcon.classList.add('hidden');
                    eyeIcon.classList.remove('hidden');
                } else {
                    // Show lock, hide eye if empty
                    lockIcon.classList.remove('hidden');
                    eyeIcon.classList.add('hidden');

                    // Reset to hidden password if they backspace everything
                    passwordInput.type = 'password';
                }
            });

            // Listen for clicking on the eye icon
            eyeIcon.addEventListener('click', function() {
                // Toggle between 'password' and 'text'
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text'; // Shows the password
                    eyeIcon.classList.add('text-yellow-500'); // Optional: change color when active
                } else {
                    passwordInput.type = 'password'; // Hides the password
                    eyeIcon.classList.remove('text-yellow-500');
                }
            });
        });
    </script>

</body>
</html>
