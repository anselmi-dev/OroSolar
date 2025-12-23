<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="bg-black text-white antialiased">
    <!-- NAVBAR -->
    <header class="relative z-10 px-6 py-6 flex items-center justify-between max-w-7xl mx-auto">
        <div class="flex items-center gap-2 text-lg font-bold">
            <a wire:navigate href="{{ route('home') }}">
                {{-- <img src="{{ asset('logo/default-yellow.svg') }}" alt="Logo" class="w-full max-h-full"> --}}
                <x-app-logo class="text-app-400 w-full max-h-full" alt="{{ config('app.name', 'Laravel') }}" />
            </a>
        </div>

        <nav class="hidden md:flex items-center gap-10 text-sm font-medium">
            {{-- <a wire:navigate href="{{ route('home') }}" class="hover:text-app-400">Home</a> --}}
            {{-- <a wire:navigate href="{{ route('about') }}" class="hover:text-app-400">About</a> --}}
            {{-- <a wire:navigate href="{{ route('projects') }}" class="hover:text-app-400">Projects</a> --}}
            {{-- <a wire:navigate href="{{ route('page') }}" class="hover:text-app-400">Page</a> --}}
            {{-- <a wire:navigate href="{{ route('blog') }}" class="hover:text-app-400">Blog</a> --}}
            {{-- <a wire:navigate href="{{ route('contact') }}" class="hover:text-app-400">Contáctanos</a> --}}
        </nav>

        <a wire:navigate href="{{ route('contact') }}"
            class="hover:bg-app-400 px-6 py-3 rounded-full font-semibold border border-app-400 text-app-400 hover:text-black transition">
            Contáctanos
        </a>
    </header>

    {{ $slot }}


    <footer class="bg-gradient-to-t from-black to-neutral-800 text-gray-300 pt-16 pb-6">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">

            <!-- Logo + Descripción -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <x-app-logo class="text-app-400 w-full max-h-full" alt="{{ config('app.name', 'Laravel') }}" />
                </div>
                <p class="text-sm leading-relaxed text-gray-400">
                    Energía solar y almacenamiento inteligente para que tu empresa nunca se detenga
                </p>
            </div>

            <!-- Contact Us -->
            <div>
                <h3 class="text-white font-semibold mb-4">Contáctanos</h3>
                <ul class="space-y-3 text-sm">
                    @if (setting('address'))
                        <li class="flex items-start gap-2">
                            <span class="text-app-400 flex-shrink-0 mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </span>
                            {{ setting('address') }}
                        </li>
                    @endif
                    @if (setting('phone'))
                        <li class="flex items-center gap-2">
                            <span class="text-app-400 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            </span>
                            <a href="tel:{{ setting('phone') }}"
                                class="hover:text-app-400 transition">{{ setting('phone') }}</a>
                        </li>
                    @endif
                    @if (setting('email'))
                        <li class="flex items-center gap-2">
                            <span class="text-app-400 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="16" x="2" y="4" rx="2" />
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                </svg>
                            </span>
                            <a href="mailto:{{ setting('email') }}"
                                class="hover:text-app-400 transition">{{ setting('email') }}</a>
                        </li>
                    @endif
                    @if (setting('schedule'))
                        <li class="flex items-center gap-2">
                            <span class="text-app-400 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg>
                            </span>
                            {{ setting('schedule') }}
                        </li>
                    @endif
                </ul>
            </div>

            <!-- Support -->
            {{-- <div>
                <h3 class="text-white font-semibold mb-4">Support</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('faqs') }}" class="hover:text-app-500  text-app-400">FAQs</a></li>
                    <li><a href="{{ route('privacy-policy') }}" class="hover:text-app-500  text-app-400">Privacy Policy</a></li>
                    <li><a href="{{ route('terms-of-service') }}" class="hover:text-app-500  text-app-400">Terms & Conditions</a></li>
                </ul>
            </div> --}}

            <!-- Follow Us -->
            {{--
                <div>
                    <h3 class="text-white font-semibold mb-4">Follow Us</h3>
                    <div class="flex gap-4">
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-600 hover:border-app-400 hover:text-app-400 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-600 hover:border-app-400 hover:text-app-400 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-600 hover:border-app-400 hover:text-app-400 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-600 hover:border-app-400 hover:text-app-400 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/>
                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/>
                            </svg>
                        </a>
                    </div>
                </div>
            --}}

        </div>

        <!-- Línea inferior -->
        <div class="border-t border-gray-700 mt-12 pt-6 text-center text-sm text-gray-400">
            Copyright © {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.
        </div>
    </footer>


    @if (setting('phone'))
        @php
            // Formatear número de teléfono para WhatsApp (eliminar espacios, guiones, paréntesis)
            $phone = preg_replace('/[^0-9+]/', '', setting('phone'));
            // Si no tiene código de país, agregar +56 (Chile)
            if (!str_starts_with($phone, '+')) {
                $phone = '+56' . ltrim($phone, '0');
            }
            // Crear mensaje predeterminado
            $whatsappMessage = urlencode('Hola, me gustaría obtener más información sobre sus soluciones de energía solar.');
            $whatsappUrl = "https://wa.me/{$phone}?text={$whatsappMessage}";
        @endphp

        <!-- WhatsApp Floating Button -->
        <a href="{{ $whatsappUrl }}"
           target="_blank"
           rel="noopener noreferrer"
           class="fixed bottom-6 right-6 z-50 group"
           aria-label="Contactar por WhatsApp">
            <div class="relative">
                <!-- Pulse Animation -->
                <div class="absolute inset-0 bg-green-500 rounded-full animate-ping opacity-75"></div>

                <!-- Button -->
                <div class="relative bg-green-500 hover:bg-green-600 text-white rounded-full p-4 shadow-lg transition-all duration-300 hover:scale-110 flex items-center justify-center w-16 h-16">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                </div>

                <!-- Tooltip -->
                <div class="absolute right-full mr-3 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                    <div class="bg-gray-900 text-white text-sm px-3 py-2 rounded-lg whitespace-nowrap shadow-lg">
                        Escríbenos por WhatsApp
                        <div class="absolute left-full top-1/2 -translate-y-1/2 border-4 border-transparent border-l-gray-900"></div>
                    </div>
                </div>
            </div>
        </a>
    @endif

    @fluxScripts

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: false, // Permite que la animación se repita
            mirror: true, // Activa la animación al hacer scroll hacia arriba también
            offset: 100, // Offset en px desde el borde del viewport
        });
    </script>

    <!-- SCRIPTS EXTRA -->
    @stack('scripts')

</body>

</html>
