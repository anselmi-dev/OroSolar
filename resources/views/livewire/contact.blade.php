<div class="min-h-screen bg-black text-white py-20 px-10">
    <div class="max-w-7xl mx-auto" _data-aos="fade-up">
        <h1 class="text-5xl font-extrabold mb-8">Contáctanos</h1>
        <p class="text-neutral-400 text-lg leading-relaxed mb-5">
            Ponte en contacto con nosotros para cualquier pregunta o consulta sobre nuestras soluciones de energía
            renovable.
        </p>
        <p class="text-gray-400 text-lg">
            Estamos aquí para ayudarte. Contáctanos a través de cualquiera de nuestros canales de comunicación.
        </p>
    </div>

    <section class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 py-10">

        <!-- LEFT: FORM -->
        <div _data-aos="fade-right">
            {{-- <h3 class="text-app-400 font-semibold text-lg mb-2">Contáctanos</h3> --}}
            {{-- <h2 class="text-4xl font-bold mb-4">Envíanos un Mensaje</h2> --}}
            <!-- Form -->
            <form wire:submit="submit" class="space-y-6">
                <!-- Row 1 -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input type="text" wire:model="name" placeholder="Tu nombre"
                            class="w-full bg-transparent border @error('name') border-red-500 @else border-gray-500 @enderror rounded-lg px-4 py-3 text-gray-200 placeholder-gray-400 focus:border-app-400 focus:outline-none">
                        @error('name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="email" wire:model="email" placeholder="Tu correo electrónico"
                            class="w-full bg-transparent border @error('email') border-red-500 @else border-gray-500 @enderror rounded-lg px-4 py-3 text-gray-200 placeholder-gray-400 focus:border-app-400 focus:outline-none">
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Country Selector -->
                    <div>
                        <div class="flex">
                            <div class="flex items-center px-4 bg-app-400 text-black font-semibold rounded-l-lg">
                                +56
                            </div>
                            <input type="text" wire:model="phone" placeholder="Tu número de teléfono"
                                class="w-full bg-transparent border @error('phone') border-red-500 @else border-gray-500 @enderror rounded-r-lg px-4 py-3 text-gray-200 placeholder-gray-400 focus:border-app-400 focus:outline-none">
                        </div>
                        @error('phone')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" wire:model="subject" placeholder="Asunto de tu consulta"
                            class="w-full bg-transparent border @error('subject') border-red-500 @else border-gray-500 @enderror rounded-lg px-4 py-3 text-gray-200 placeholder-gray-400 focus:border-app-400 focus:outline-none">
                        @error('subject')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Message -->
                <div>
                    <textarea rows="5" wire:model="message" placeholder="Escribe tu mensaje aquí..."
                        class="w-full bg-transparent border @error('message') border-red-500 @else border-gray-500 @enderror rounded-lg px-4 py-3 text-gray-200 placeholder-gray-400 focus:border-app-400 focus:outline-none"></textarea>
                    @error('message')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <p class="text-gray-400 mb-10">
                    Completa el formulario y nos pondremos en contacto contigo lo antes posible para resolver tus dudas
                    sobre nuestras soluciones energéticas.
                </p>

                <!-- Success Message -->
                @if ($success)
                    <div class="bg-green-500/20 border border-green-500 text-green-400 px-4 py-3 rounded-lg mb-4">
                        <p class="font-semibold">¡Mensaje enviado exitosamente!</p>
                        <p class="text-sm">Gracias por contactarnos. Te responderemos pronto.</p>
                    </div>
                @endif

                <!-- Submit button -->
                <button type="submit" wire:loading.attr="disabled" wire:target="submit"
                    class="w-full bg-app-400 text-black font-semibold py-3 rounded-lg hover:bg-app-500 transition disabled:opacity-50 disabled:cursor-not-allowed">
                    <span wire:loading.remove wire:target="submit">ENVIAR MENSAJE</span>
                    <span wire:loading wire:target="submit">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span>Enviando...</span>
                        </span>
                    </span>
                </button>
            </form>
        </div>

        <!-- RIGHT: INFO -->
        <div _data-aos="fade-left">
            <div class="space-y-8">

                <!-- Location -->
                @if (setting('address'))
                    <div class="flex items-start gap-4" _data-aos="fade-up" _data-aos-delay="100">
                        <svg class="text-app-400 w-6 h-6 flex-shrink-0 mt-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-lg">Ubicación</h4>
                            <p class="text-app-400">{{ setting('address') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Mail -->
                @if (setting('email'))
                    <div class="flex items-start gap-4" _data-aos="fade-up" _data-aos-delay="200">
                        <svg class="text-app-400 w-6 h-6 flex-shrink-0 mt-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-lg">Correo</h4>
                            <p class="text-app-400">{{ setting('email') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Phone -->
                @if (setting('phone'))
                    <div class="flex items-start gap-4" _data-aos="fade-up" _data-aos-delay="300">
                        <svg class="text-app-400 w-6 h-6 flex-shrink-0 mt-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-lg">Teléfono</h4>
                            <p class="text-app-400">{{ setting('phone') }}</p>
                        </div>
                    </div>
                @endif

                @if (setting('schedule'))
                    <!-- Work Hours -->
                    <div class="flex items-start gap-4" _data-aos="fade-up" _data-aos-delay="400">
                        <svg class="text-app-400 w-6 h-6 flex-shrink-0 mt-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-lg">Horario de Trabajo</h4>
                            <p class="text-app-400">{{ setting('schedule') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Follow Us -->
                {{--
                <div class="pt-4" _data-aos="fade-up" _data-aos-delay="500">
                    <h3 class="text-xl font-semibold mb-2">Síguenos:</h3>
                    <p class="text-gray-400 mb-4">
                        Mantente al día con nuestras últimas noticias y actualizaciones en nuestras redes sociales.
                    </p>

                    <div class="flex gap-4 text-app-400">
                        <a href="#" class="hover:text-app-300 transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                        <a href="#" class="hover:text-app-300 transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="hover:text-app-300 transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="hover:text-app-300 transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                --}}
            </div>
        </div>
    </section>
</div>
