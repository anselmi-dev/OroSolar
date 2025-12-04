<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="bg-black text-white antialiased">
    <!-- NAVBAR -->
    <header class="relative z-10 py-6 flex items-center justify-between max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-lg font-bold">
            <a wire:navigate href="{{ route('home') }}">
                <img src="{{ asset('logo/default-yellow.svg') }}" alt="Logo" class="w-full max-h-full">
            </a>
        </div>

        <nav class="hidden md:flex items-center gap-10 text-sm font-medium">
            <a wire:navigate href="{{ route('home') }}" class="hover:text-yellow-400">Home</a>
            <a wire:navigate href="{{ route('about') }}" class="hover:text-yellow-400">About</a>
            <a wire:navigate href="{{ route('projects') }}" class="hover:text-yellow-400">Projects</a>
            <a wire:navigate href="{{ route('page') }}" class="hover:text-yellow-400">Page</a>
            <a wire:navigate href="{{ route('blog') }}" class="hover:text-yellow-400">Blog</a>
            <a wire:navigate href="{{ route('contact') }}" class="hover:text-yellow-400">Contact</a>
        </nav>

        <a wire:navigate href="{{ route('contact') }}"
            class="bg-yellow-400 text-black px-6 py-3 rounded font-semibold hover:bg-yellow-300 transition">
            Let's Talk
        </a>
    </header>

    {{ $slot }}


    <footer class="bg-gradient-to-t from-black to-neutral-800 text-gray-300 pt-16 pb-6">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">

            <!-- Logo + Descripción -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('logo/default-yellow.svg') }}" alt="Logo" class="w-full max-h-full">
                </div>
                <p class="text-sm leading-relaxed text-gray-400">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper.
                </p>
            </div>

            <!-- Contact Us -->
            <div>
                <h3 class="text-white font-semibold mb-4">Contact Us</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-2">
                        <span class="text-yellow-400">📍</span>
                        KLLG St. No 99, Pku City, ID 28289
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">📞</span>
                        +62 761-852-3398
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✉️</span>
                        hello@domainaiste.com
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">⏰</span>
                        Mon - Thu : 09:00 - 17:00 WIB
                    </li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-white font-semibold mb-4">Support</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-yellow-500  text-yellow-400">FAQs</a></li>
                    <li><a href="#" class="hover:text-yellow-500  text-yellow-400">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-yellow-500  text-yellow-400">Terms & Conditions</a></li>
                    <li><a href="#" class="hover:text-yellow-500  text-yellow-400">Disclaimer</a></li>
                </ul>
            </div>

            <!-- Follow Us -->
            <div>
                <h3 class="text-white font-semibold mb-4">Follow Us</h3>
                <div class="flex gap-4">
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-600 hover:border-yellow-400 hover:text-yellow-400 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-600 hover:border-yellow-400 hover:text-yellow-400 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-600 hover:border-yellow-400 hover:text-yellow-400 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-600 hover:border-yellow-400 hover:text-yellow-400 transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- Línea inferior -->
        <div class="border-t border-gray-700 mt-12 pt-6 text-center text-sm text-gray-400">
            Copyright © {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.
        </div>
    </footer>

    @fluxScripts

    <!-- SCRIPTS EXTRA -->
    @stack('scripts')

</body>

</html>
