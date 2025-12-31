@section('seo')
<x-layouts.seo :meta="seo('home')" />
@endsection

<div class="relative min-h-screen bg-black text-white overflow-hidden">
    <div class="w-full h-[calc(100vh-100px)] absolute inset-0 z-0">
        <img
            src="{{ asset('images/slider-home.png') }}"
            class="absolute right-0 top-0 h-full object-cover _opacity-90 w-full"
            alt="OroSolar"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
    </div>

    <section class="max-w-7xl mx-auto relative z-10 mt-24 px-6">
        <div
            class="max-w-4xl bg-neutral-800/90 rounded-2xl px-14 py-16 relative"
            data-aos="fade-up"
        >

            <span class="text-app-400 font-semibold z-1 relative">Energía Solar</span>

            <h1 class="text-4xl font-extrabold mt-6 leading-tight z-1 relative">
                Energía solar y almacenamiento <br />
                inteligente para que tu empresa <br />
                nunca se detenga
            </h1>

            <p class="text-2xl text-neutral-300 mt-6 leading-relaxed z-1 relative">
                Energía que reduce tus costos. Resiliencia que impulsa tu operación.
            </p>

            <!-- CÍRCULO AMARILLO -->
            <div
                class="absolute right-32 top-1/2 -translate-y-1/2 w-24 h-24 border-2 border-app-400 rounded-full"
            ></div>
        </div>
    </section>

    <!-- FOOTER INFO -->
    <section class="max-w-7xl mx-auto relative z-10 px-10 mt-20 flex items-center justify-between text-sm" data-aos="fade-up" data-aos-delay="100">
        <div class="flex items-center gap-6">
            {{-- <span class="font-semibold">OroSolar</span> --}}

            <span class="w-px h-[90px] bg-app-400"></span>

            <p class="max-w-xl text-neutral-400 text-xl">
                En un mercado donde la energía es cada vez más costosa e inestable, transformamos la manera en que tu empresa consume, produce y almacena electricidad.
            </p>
        </div>

        {{--
        <div class="flex items-center gap-4 text-app-400">
            <a href="#" class="hover:text-app-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                </svg>
            </a>
            <a href="#" class="hover:text-app-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>
                </svg>
            </a>
            <a href="#" class="hover:text-app-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                </svg>
            </a>
            <a href="#" class="hover:text-app-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/>
                    <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/>
                </svg>
            </a>
        </div>
        --}}
    </section>

    <section class="max-w-7xl mx-auto _bg-black text-white py-32 px-10" data-aos="fade-up">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-20">

            <!-- LEFT BLOCKS -->
            {{-- <div class="space-y-20" data-aos="fade-right">

                <!-- Ahorro Inmediato -->
                <div>
                    <div class="flex items-center gap-4 mb-5">
                        <span class="w-1 h-6 bg-app-400"></span>
                        <h3 class="text-xl font-semibold">⚡ Ahorro Inmediato</h3>
                    </div>

                    <p class="text-neutral-400 leading-relaxed">
                        Reducción de hasta 40% en tu cuenta eléctrica. Optimizamos el uso de energía solar, desplazamos consumos de horas punta y utilizamos baterías para reducir cargos por potencia, demanda y energía.
                    </p>
                </div>

                <!-- Continuidad Garantizada -->
                <div>
                    <div class="flex items-center gap-4 mb-5">
                        <span class="w-1 h-6 bg-app-400"></span>
                        <h3 class="text-xl font-semibold">🔋 Continuidad Garantizada</h3>
                    </div>

                    <p class="text-neutral-400 leading-relaxed">
                        Eliminación de paradas por cortes eléctricos. Con almacenamiento inteligente y respaldo automático, tu operación sigue funcionando incluso en interrupciones de red.
                    </p>
                </div>
            </div> --}}

            <!-- RIGHT BIG CONTENT -->
            <div class="lg:col-span-full" data-aos="fade-left">
                <span class="text-app-400 font-semibold tracking-wide text-lg">
                    Nuestra Propuesta
                </span>

                <h2 class="text-4xl lg:text-5xl font-extrabold mt-6 leading-tight">
                    Diseñamos, instalamos y mantenemos <br class="hidden sm:block">
                    soluciones fotovoltaicas y sistemas de <br class="hidden sm:block">
                    almacenamiento (BESS)
                </h2>

                <p class="mt-8 max-w-2xl text-neutral-400 leading-relaxed text-xl">
                    Disminuimos tu gasto energético, mejoramos tu eficiencia operativa y aseguramos continuidad eléctrica 24/7. Sistemas escalables que acompañan el crecimiento de tu empresa, desde pequeña industria hasta infraestructura crítica.
                </p>
            </div>

        </div>
    </section>

    <!-- BENEFICIOS CON CHECKMARKS -->
    <section class="max-w-7xl mx-auto bg-black text-white py-32 px-10" data-aos="fade-up">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-app-400 font-semibold tracking-wide text-lg">
                    Nuestros Sistemas Permiten
                </span>
                <h2 class="text-4xl lg:text-5xl font-extrabold mt-4">
                    Ahorro inmediato. Continuidad garantizada
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto">
                <!-- Beneficio 1 -->
                <div class="group bg-neutral-900 rounded-xl p-8 hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center gap-4">
                        <!-- icono -->
                        <div class="text-app-400 flex-shrink-0 group-hover:scale-120 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="20" x2="12" y2="10"></line>
                                <line x1="18" y1="20" x2="18" y2="4"></line>
                                <line x1="6" y1="20" x2="6" y2="16"></line>
                            </svg>
                        </div>
                        <!-- end:icono -->
                        <div>
                            <h3 class="text-xl font-bold mb-3">Reducción de hasta 40% en tu cuenta eléctrica</h3>
                        </div>
                    </div>
                    <p class="text-neutral-400 leading-relaxed">
                        Optimizamos el uso de energía solar, desplazamos consumos de horas punta y utilizamos baterías para reducir cargos por potencia, demanda y energía.
                    </p>
                </div>

                <!-- Beneficio 2 -->
                <div class="group bg-neutral-900 rounded-xl p-8 hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center gap-4">
                        <!-- icono -->
                        <div class="text-app-400 flex-shrink-0 group-hover:scale-120 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                <path d="M9 12l2 2 4-4"></path>
                            </svg>
                        </div>
                        <!-- end:icono -->
                        <div>
                            <h3 class="text-xl font-bold mb-3">Eliminación de paradas por cortes eléctricos</h3>
                        </div>
                    </div>
                    <p class="text-neutral-400 leading-relaxed">
                        Con almacenamiento inteligente y respaldo automático, tu operación sigue funcionando incluso en interrupciones de red.
                    </p>
                </div>

                <!-- Beneficio 3 -->
                <div class="group bg-neutral-900 rounded-xl p-8 hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center gap-4">
                        <!-- icono -->
                        <div class="text-app-400 flex-shrink-0 group-hover:scale-120 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                        </div>
                        <!-- end:icono -->
                        <div>
                            <h3 class="text-xl font-bold mb-3">Independencia energética a largo plazo</h3>
                        </div>
                    </div>
                    <p class="text-neutral-400 leading-relaxed text-xl">
                        Sistemas escalables que acompañan el crecimiento de tu empresa, desde pequeña industria hasta infraestructura crítica.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto bg-black text-white py-32 px-10" data-aos="fade-up">

        <!-- STATS -->
        <div
            x-data="{
                animated: false,
                stats: [
                    { value: 10, suffix: '', isDecimal: false },
                    { value: 64, suffix: '', isDecimal: false },
                    { value: 53, suffix: '', isDecimal: false },
                    { value: 0.93, suffix: ' MW', isDecimal: true }
                ],
                currentValues: [0, 0, 0, 0],
                animateCounter(index) {
                    const target = this.stats[index].value;
                    const duration = 3000; // 3 segundos
                    const steps = 60;
                    const increment = target / steps;
                    const stepDuration = duration / steps;
                    let current = 0;

                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            this.currentValues[index] = target;
                            clearInterval(timer);
                        } else {
                            this.currentValues[index] = current;
                        }
                    }, stepDuration);
                },
                animateAll() {
                    if (this.animated) return;
                    this.animated = true;
                    this.stats.forEach((_, index) => {
                        setTimeout(() => {
                            this.animateCounter(index);
                        }, index * 100);
                    });
                },
                formatNumber(value, isDecimal) {
                    if (isDecimal) {
                        return value.toFixed(2);
                    }
                    return Math.floor(value).toLocaleString('en-US');
                }
            }"
            x-intersect="animateAll()"
            class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-12 text-center bg-neutral-900 rounded-xl p-8 hover:bg-neutral-800 transition"
        >

            <!-- Item -->
            <div class="relative">
                <p class="text-5xl font-extrabold">
                    <span x-text="formatNumber(currentValues[0], stats[0].isDecimal)"></span><span x-text="stats[0].suffix"></span>
                </p>
                <p class="text-app-400 mt-2 font-semibold">Años de Experiencia</p>
            </div>

            <div class="relative">
                <p class="text-5xl font-extrabold">
                    <span x-text="formatNumber(currentValues[1], stats[1].isDecimal)"></span><span x-text="stats[1].suffix"></span>
                </p>
                <p class="text-app-400 mt-2 font-semibold">Proyectos Completados</p>
            </div>

            <div class="relative">
                <p class="text-5xl font-extrabold">
                    <span x-text="formatNumber(currentValues[2], stats[2].isDecimal)"></span><span x-text="stats[2].suffix"></span>
                </p>
                <p class="text-app-400 mt-2 font-semibold">Clientes Felices</p>
            </div>

            <div class="relative">
                <p class="text-5xl font-extrabold">
                    <span x-text="formatNumber(currentValues[3], stats[3].isDecimal)"></span><span x-text="stats[3].suffix"></span>
                </p>
                <p class="text-app-400 mt-2 font-semibold">MW Instalados</p>
            </div>

        </div>
    </section>

    <section class="max-w-7xl mx-auto bg-black text-white py-32 px-10" data-aos="fade-up">
        <!-- HEADING -->
        <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
            <span class="text-app-400 font-semibold tracking-wide text-lg">
                Nuestras Soluciones
            </span>

            <h2 class="text-4xl lg:text-5xl font-extrabold mt-4">
                Soluciones que integran Solar + Baterías + Control Inteligente
            </h2>

            <p class="mt-6 text-neutral-400 leading-relaxed text-xl">
                Creamos arquitecturas energéticas seguras, certificadas y diseñadas para tu necesidad específica.
            </p>
        </div>

        <!-- SOLUTIONS GRID -->
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-12">

            <!-- CARD -->
            <div class="group bg-neutral-900 rounded-xl p-10 hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="100">
                <div class="mb-6 text-app-400 group-hover:scale-120 transition-all group-hover:ml-[20px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </div>

                <h3 class="text-xl font-bold mb-4">Sistemas Fotovoltaicos Industriales y Comerciales (On-Grid / Off-Grid)</h3>

                <p class="text-neutral-400">
                    Instalación de paneles solares conectados a la red o independientes para empresas e industrias.
                </p>
            </div>

            <div class="group bg-neutral-900 rounded-xl p-10 hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="200">
                <div class="mb-6 text-app-400 group-hover:scale-120 transition-all group-hover:ml-[20px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                        <path d="M8 2h8M8 22h8"></path>
                    </svg>
                </div>

                <h3 class="text-xl font-bold mb-4">Baterías de Iones de Litio para Respaldo o Peak Shaving</h3>

                <p class="text-neutral-400">
                    Almacenamiento de energía para respaldo eléctrico y reducción de picos de demanda.
                </p>
            </div>

            <div class="group bg-neutral-900 rounded-xl p-10 hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="300">
                <div class="mb-6 text-app-400 group-hover:scale-120 transition-all group-hover:ml-[20px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="6" y1="11" x2="6" y2="11"></line>
                        <line x1="12" y1="11" x2="12" y2="11"></line>
                        <line x1="18" y1="11" x2="18" y2="11"></line>
                        <path d="M7 5a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"></path>
                        <path d="M12 17v-4"></path>
                    </svg>
                </div>

                <h3 class="text-xl font-bold mb-4">Sistemas Híbridos Solar + BESS</h3>

                <p class="text-neutral-400">
                    Combinación de energía solar con sistemas de almacenamiento para máxima eficiencia y continuidad.
                </p>
            </div>

            <div class="group bg-neutral-900 rounded-xl p-10 hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="400">
                <div class="mb-6 text-app-400 group-hover:scale-120 transition-all group-hover:ml-[20px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 2v20M2 12h20"></path>
                        <path d="M8 8l8 8M16 8l-8 8"></path>
                    </svg>
                </div>

                <h3 class="text-xl font-bold mb-4">Proyectos sin paneles solares (solo almacenamiento y respaldo)</h3>

                <p class="text-neutral-400">
                    Soluciones de almacenamiento y respaldo eléctrico sin necesidad de paneles solares.
                </p>
            </div>

            <div class="group bg-neutral-900 rounded-xl p-10 hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="500">
                <div class="mb-6 text-app-400 group-hover:scale-120 transition-all group-hover:ml-[20px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 18H3a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h2"></path>
                        <path d="M19 18h2a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2h-2"></path>
                        <line x1="7" y1="8" x2="7" y2="16"></line>
                        <line x1="17" y1="8" x2="17" y2="16"></line>
                        <line x1="12" y1="8" x2="12" y2="16"></line>
                        <path d="M7 8h10a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2z"></path>
                        <circle cx="7" cy="18" r="2"></circle>
                        <circle cx="17" cy="18" r="2"></circle>
                    </svg>
                </div>

                <h3 class="text-xl font-bold mb-4">Integración con Victron, SMA, Huawei, Solis, Schneider y más</h3>

                <p class="text-neutral-400">
                    Compatibilidad con las principales marcas de inversores y equipos del mercado.
                </p>
            </div>

            <div class="group bg-neutral-900 rounded-xl p-10 hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="600">
                <div class="mb-6 text-app-400 group-hover:scale-120 transition-all group-hover:ml-[20px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"></line>
                        <line x1="12" y1="20" x2="12" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="14"></line>
                    </svg>
                </div>

                <h3 class="text-xl font-bold mb-4">Monitoreo y gestión energética en tiempo real</h3>

                <p class="text-neutral-400">
                    Plataforma de supervisión para monitorear producción, consumo y salud del sistema en tiempo real.
                </p>
            </div>

        </div>
    </section>

    <section class="max-w-7xl mx-auto bg-black text-white px-10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-1 py-32 gap-20 items-center" data-aos="fade-up">
            <!-- LEFT CARD -->
            <div
                x-data="{
                    scrollY: 0,
                    mouseX: 0,
                    mouseY: 0,
                    init() {
                        let ticking = false;
                        window.addEventListener('scroll', () => {
                            if (!ticking) {
                                window.requestAnimationFrame(() => {
                                    const rect = this.$el.getBoundingClientRect();
                                    const elementTop = rect.top + window.scrollY;
                                    const scrollPosition = window.scrollY + window.innerHeight;
                                    const elementCenter = elementTop + (rect.height / 2);
                                    this.scrollY = (scrollPosition - elementCenter) * 0.05;
                                    ticking = false;
                                });
                                ticking = true;
                            }
                        });
                        this.$el.addEventListener('mousemove', (e) => {
                            const rect = this.$el.getBoundingClientRect();
                            this.mouseX = (e.clientX - rect.left - rect.width / 2) * 0.015;
                            this.mouseY = (e.clientY - rect.top - rect.height / 2) * 0.015;
                        });
                        this.$el.addEventListener('mouseleave', () => {
                            this.mouseX = 0;
                            this.mouseY = 0;
                        });
                    }
                }"
                class="relative lg:col-span-2 rounded-2xl overflow-hidden bg-neutral-800/90 p-14"
                data-aos="fade-right"
            >
                <!-- Imagen de fondo -->
                <img
                    src="{{ asset('images/solar-8244680_1920.jpg') }}"
                    class="absolute inset-0 w-full h-full object-cover opacity-80 z-1 transition-transform duration-300 ease-out"
                    :style="`transform: translate(${mouseX}px, ${mouseY + scrollY}px) scale(1.4);`"
                >
                <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent z-1"></div>

                <!-- Content -->
                <div class="relative z-10">
                    <span class="text-app-400 font-semibold text-xl">Instalación Profesional</span>

                    <h2 class="text-4xl lg:text-5xl font-extrabold mt-4 leading-tight max-w-2xl">
                        Mantenimiento Garantizado
                    </h2>

                    <div class="flex gap-6 mt-8">
                        <span class="w-1 bg-app-400"></span>
                        <div class="max-w-xl text-neutral-300 leading-relaxed space-y-3">
                            <p>
                                Brindamos soporte completo para la continuidad eléctrica:
                            </p>
                            <ul class="space-y-2 list-none">
                                <li class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-app-400 flex-shrink-0">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="9 12 11 14 15 10"></polyline>
                                    </svg>
                                    <span>Auditoría energética</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-app-400 flex-shrink-0">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="9 12 11 14 15 10"></polyline>
                                    </svg>
                                    <span>Ingeniería y diseño</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-app-400 flex-shrink-0">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="9 12 11 14 15 10"></polyline>
                                    </svg>
                                    <span>Instalación certificada SEC</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-app-400 flex-shrink-0">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="9 12 11 14 15 10"></polyline>
                                    </svg>
                                    <span>Puesta en marcha y monitoreo</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-app-400 flex-shrink-0">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="9 12 11 14 15 10"></polyline>
                                    </svg>
                                    <span>Mantenimiento preventivo y correctivo</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-app-400 flex-shrink-0">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="9 12 11 14 15 10"></polyline>
                                    </svg>
                                    <span>Garantías extendidas y servicio postventa</span>
                                </li>
                            </ul>
                            <p class="mt-4">
                                Todo orientado a maximizar la vida útil del sistema y asegurar una disponibilidad superior al 99,5%.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT STATS -->
            {{-- <div class="grid grid-cols-2 gap-16 text-center">

                <!-- Item -->
                <div data-aos="fade-left" data-aos-delay="100">
                    <p class="text-4xl font-extrabold">40%</p>
                    <p class="text-app-400 font-semibold mt-2">
                        Reducción en Cuenta Eléctrica
                    </p>
                    <p class="text-neutral-400 mt-2 text-sm max-w-xs mx-auto">
                        Optimización del uso energético con sistemas inteligentes.
                    </p>
                </div>

                <div data-aos="fade-left" data-aos-delay="200">
                    <p class="text-4xl font-extrabold">24/7</p>
                    <p class="text-app-400 font-semibold mt-2">
                        Continuidad Eléctrica
                    </p>
                    <p class="text-neutral-400 mt-2 text-sm max-w-xs mx-auto">
                        Respaldo automático sin interrupciones operativas.
                    </p>
                </div>

                <div data-aos="fade-left" data-aos-delay="300">
                    <p class="text-4xl font-extrabold">99.5%</p>
                    <p class="text-app-400 font-semibold mt-2">
                        Disponibilidad del Sistema
                    </p>
                    <p class="text-neutral-400 mt-2 text-sm max-w-xs mx-auto">
                        Mantenimiento preventivo y monitoreo continuo.
                    </p>
                </div>

                <div data-aos="fade-left" data-aos-delay="400">
                    <p class="text-4xl font-extrabold">100%</p>
                    <p class="text-app-400 font-semibold mt-2">
                        Independencia Energética
                    </p>
                    <p class="text-neutral-400 mt-2 text-sm max-w-xs mx-auto">
                        Sistemas escalables para el crecimiento de tu empresa.
                    </p>
                </div>

            </div> --}}

        </div>
    </section>

    <section class="max-w-7xl mx-auto bg-black text-white py-32 px-10 relative overflow-hidden" data-aos="fade-up">

        <!-- HEADER -->
        <div class="relative z-10 text-center max-w-4xl mx-auto mb-20">
            <span class="text-app-400 font-semibold tracking-wide text-lg">
                Tecnología Inteligente
            </span>

            <h2 class="text-4xl lg:text-5xl font-extrabold mt-4">
                Operar sin preocupaciones
            </h2>

            <p class="mt-6 text-neutral-400 leading-relaxed text-xl	">
                Nuestra plataforma de supervisión te permite ver tu ahorro en tiempo real, monitorear producción, consumo y salud de baterías, detectar fallas antes de que ocurran y recibir reportes automáticos de desempeño. Tu energía, siempre bajo control.
            </p>
        </div>

        <!-- GRID / SLIDER MOCK -->
        {{-- <div class="relative z-10 max-w-7xl mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-center">

                <!-- ITEM 1 -->
                <div class="rounded-2xl overflow-hidden group" data-aos="zoom-in" data-aos-delay="100">
                    <img
                        src="{{ asset('images/windmills-PXPECRSa.jpg') }}"
                        class="w-full h-[420px] object-cover group-hover:scale-105 transition duration-500"
                        alt=""
                    >
                </div>

                <!-- ITEM 2 (DESTACADO) -->
                <div class="rounded-2xl overflow-hidden group scale-105" data-aos="zoom-in" data-aos-delay="200">
                    <img
                        src="{{ asset('images/aerial-view-of-wind-turbine-farm-wind-power-plant-2021-08-27-11-27-37-utca.jpg') }}"
                        class="w-full h-[480px] object-cover group-hover:scale-105 transition duration-500"
                        alt=""
                    >
                </div>

                <!-- ITEM 3 -->
                <div class="rounded-2xl overflow-hidden group" data-aos="zoom-in" data-aos-delay="300">
                    <img
                        src="{{ asset('images/solar-power-plant-X3EXYCBa.jpg') }}"
                        class="w-full h-[420px] object-cover group-hover:scale-105 transition duration-500"
                        alt=""
                    >
                </div>

            </div>

            <!-- DOTS -->
            <div class="flex justify-center mt-12 gap-3">
                <span class="w-2 h-2 rounded-full bg-white/30"></span>
                <span class="w-2 h-2 rounded-full bg-app-400"></span>
                <span class="w-2 h-2 rounded-full bg-white/30"></span>
            </div>

        </div> --}}
    </section>

    <section class="max-w-7xl mx-auto bg-black text-white py-32 px-10" data-aos="fade-up">
        <div class="max-w-4xl mx-auto text-center mb-20">
            <span class="text-app-400 font-semibold tracking-wide text-lg">
                Sectores
            </span>

            <h2 class="text-4xl lg:text-5xl font-extrabold mt-4">
                Diseñado para Empresas que Necesitan Disponibilidad Eléctrica Total
            </h2>

            <p class="mt-6 text-neutral-400 leading-relaxed">
                Soluciones ideales para diferentes industrias y necesidades operativas.
            </p>
        </div>

        <!-- GRID DE SECTORES -->
        <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="bg-neutral-900 rounded-xl p-6 text-center hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="100">
                <p class="text-neutral-300 font-semibold">Industria y Manufactura</p>
            </div>
            <div class="bg-neutral-900 rounded-xl p-6 text-center hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="200">
                <p class="text-neutral-300 font-semibold">Centros de Distribución</p>
            </div>
            <div class="bg-neutral-900 rounded-xl p-6 text-center hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="300">
                <p class="text-neutral-300 font-semibold">Mineras y Faenas Remotas</p>
            </div>
            <div class="bg-neutral-900 rounded-xl p-6 text-center hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="400">
                <p class="text-neutral-300 font-semibold">Retail y Centros Comerciales</p>
            </div>
            <div class="bg-neutral-900 rounded-xl p-6 text-center hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="500">
                <p class="text-neutral-300 font-semibold">Edificios Corporativos</p>
            </div>
            <div class="bg-neutral-900 rounded-xl p-6 text-center hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="600">
                <p class="text-neutral-300 font-semibold">Agricultura y Riego</p>
            </div>
            <div class="bg-neutral-900 rounded-xl p-6 text-center hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="700">
                <p class="text-neutral-300 font-semibold">Centros de Datos</p>
            </div>
            <div class="bg-neutral-900 rounded-xl p-6 text-center hover:bg-neutral-800 transition" data-aos="fade-up" data-aos-delay="800">
                <p class="text-neutral-300 font-semibold">Telecomunicaciones</p>
            </div>
        </div>
    </section>

    {{-- <section class="max-w-7xl mx-auto bg-black text-white pb-32 px-10" data-aos="fade-up">
        <div
            class="max-w-7xl mx-auto rounded-2xl overflow-hidden relative bg-neutral-900"
        >

            <!-- FONDO TEXTURIZADO -->
            <img
                src="{{ asset('images/electric-fields-backgrounds-2021-08-26-22-26-40-utc2.jpg') }}"
                class="absolute inset-0 w-full h-full object-cover z-1"
            >
            <div class="absolute inset-0 bg-black/60"></div>

            <!-- CONTENIDO -->
            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-10 px-16 py-20">

                <div>
                    <span class="text-app-400 font-semibold block mb-3">
                        Estamos Aquí Para Ayudarte
                    </span>

                    <h3 class="text-3xl lg:text-4xl font-extrabold">
                        ¿Alguna Pregunta? Hablemos
                    </h3>
                </div>

                <a
                    href="#"
                    class="bg-white text-black px-10 py-4 rounded font-semibold hover:bg-app-400 transition"
                >
                    CONTÁCTANOS AHORA
                </a>
            </div>

        </div>
    </section> --}}
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
