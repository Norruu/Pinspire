<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Pinspire') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-rose-50 via-pink-50 to-amber-50">
    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-5xl bg-white/80 backdrop-blur rounded-3xl shadow-xl border border-white overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                {{-- Left Illustration / Branding --}}
                <div class="relative hidden md:block bg-gradient-to-br from-rose-100 to-pink-100 p-10">
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-extrabold tracking-wide text-rose-600">
                            PINSPIRE
                        </div>
                        <a href="{{ route('landing') }}" class="text-gray-500 hover:text-gray-800" title="Close">
                            ✕
                        </a>
                    </div>

                    <div class="mt-10">
                        <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">
                            Save & share ideas<br class="hidden lg:block" /> like a pro.
                        </h2>
                        <p class="mt-3 text-gray-600">
                            Upload pins, organize boards, and discover inspiration.
                        </p>
                    </div>

                    {{-- Replace with your own image --}}
                    <div class="mt-10">
                        <div class="aspect-[4/3] rounded-2xl bg-white/60 border border-white shadow-inner flex items-center justify-center overflow-hidden">
                            <img
                                src="{{ asset('images/auth-illustration.png') }}"
                                alt="Pinspire Illustration"
                                class="w-full h-full object-cover"
                                onerror="this.style.display='none'; this.parentElement.innerHTML = '<div class=\'text-gray-500 text-sm p-8 text-center\'>Add an illustration at <b>public/images/auth-illustration.png</b></div>';"
                            />
                        </div>
                    </div>

                    <div class="absolute bottom-6 left-10 right-10 text-xs text-gray-500">
                        © {{ date('Y') }} Pinspire. All rights reserved.
                    </div>
                </div>

                {{-- Right Form --}}
                <div class="p-8 md:p-12">
                    <div class="md:hidden flex items-center justify-between mb-6">
                        <div class="text-xl font-extrabold tracking-wide text-rose-600">
                            PINSPIRE
                        </div>
                        <a href="{{ route('landing') }}" class="text-gray-500 hover:text-gray-800" title="Close">
                            ✕
                        </a>
                    </div>

                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
