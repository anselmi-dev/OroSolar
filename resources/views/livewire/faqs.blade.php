<div class="min-h-screen bg-black text-white py-20 px-10">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-16" data-aos="fade-up">
            <span class="text-yellow-400 font-semibold tracking-wide block mb-4">
                Preguntas Frecuentes
            </span>
            <h1 class="text-5xl lg:text-6xl font-extrabold mb-6">FAQs</h1>
            <p class="text-neutral-400 text-lg leading-relaxed max-w-3xl">
                Encuentra respuestas a las preguntas más comunes sobre nuestras soluciones de energía renovable y paneles solares.
            </p>
        </div>

        <!-- FAQs Accordion -->
        <div class="max-w-full mx-auto space-y-4">
            @foreach($this->faqs as $index => $faq)
                <div
                    class="bg-neutral-900 rounded-xl overflow-hidden border border-neutral-800 transition-all duration-300 hover:border-yellow-400/50 {{ $openIndex === $index ? 'border-yellow-400/50' : '' }}"
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 50 }}"
                >
                    <!-- Question Header -->
                    <button
                        wire:click="toggle({{ $index }})"
                        class="w-full px-8 py-6 flex items-center justify-between text-left focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 focus:ring-offset-black rounded-xl"
                    >
                        <h3 class="text-xl font-semibold pr-8">
                            {{ $faq['question'] }}
                        </h3>
                        <div class="flex-shrink-0">
                            <svg
                                class="w-6 h-6 text-yellow-400 transition-transform duration-300 {{ $openIndex === $index ? 'rotate-180' : '' }}"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>

                    <!-- Answer Content -->
                    @if($openIndex === $index)
                        <div
                            wire:transition
                            class="px-8 pb-6"
                        >
                            <div class="pt-2 border-t border-neutral-800">
                                <p class="text-neutral-400 leading-relaxed">
                                    {{ $faq['answer'] }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Contact CTA Section -->
        <section class="max-w-7xl mx-auto mt-32" data-aos="fade-up">
            <div class="max-w-7xl mx-auto rounded-2xl overflow-hidden relative bg-neutral-900">
                <!-- Background Image -->
                <img
                    src="{{ asset('images/electric-fields-backgrounds-2021-08-26-22-26-40-utc2.jpg') }}"
                    class="absolute inset-0 w-full h-full object-cover z-1"
                    alt=""
                >
                <div class="absolute inset-0 bg-black/60"></div>

                <!-- Content -->
                <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-10 px-16 py-20">
                    <div>
                        <span class="text-yellow-400 font-semibold block mb-3">
                            ¿Tienes más preguntas?
                        </span>
                        <h3 class="text-3xl lg:text-4xl font-extrabold">
                            Estamos aquí para ayudarte
                        </h3>
                        <p class="text-neutral-400 mt-4 max-w-xl">
                            Si no encontraste la respuesta que buscabas, nuestro equipo de expertos está listo para ayudarte con cualquier consulta sobre energía solar.
                        </p>
                    </div>

                    <a
                        href="{{ route('contact') }}"
                        class="bg-white text-black px-10 py-4 rounded font-semibold hover:bg-yellow-400 transition whitespace-nowrap"
                    >
                        CONTACTAR AHORA
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
