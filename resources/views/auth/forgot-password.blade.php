<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinspire Forgot Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fdeae7] min-h-screen flex items-center justify-center p-4 font-sans">

    <!-- Main Card Container -->
    <div class="bg-white rounded-[2rem] shadow-xl w-full max-w-4xl flex flex-col md:flex-row relative overflow-hidden">

        <!-- Close Button (Top Right) -->
        <a href="{{ route('login') }}" class="absolute top-6 right-6 text-gray-500 hover:text-gray-800 transition z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>

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

            <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Reset Password</h2>

            <p class="text-center text-sm text-gray-500 font-medium mb-8 px-2">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.
            </p>

            <!-- Session Status Message (Shown when email is successfully sent) -->
            @if (session('status'))
                <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-sm font-medium text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <!-- Email Field -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <!-- Mail Icon -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" placeholder="example@gmail.com"
                            class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition shadow-sm" required autofocus>
                    </div>
                    <!-- Validation Error Message -->
                    @error('email')
                        <p class="mt-2 text-sm text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-[#f67280] hover:bg-[#e05b69] text-white font-bold py-3.5 px-4 rounded-xl transition duration-200 shadow-md">
                    Email Password Reset Link
                </button>
            </form>

            <!-- Footer Link -->
            <p class="text-center text-sm text-gray-600 font-medium mt-8">
                Remember your password?
                <a href="{{ route('login') }}" class="text-gray-500 font-semibold hover:underline">Log In here</a>
            </p>

        </div>
    </div>

</body>
</html>
