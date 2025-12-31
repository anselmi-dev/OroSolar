<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Resumen de Estadísticas
        </x-slot>

        <x-slot name="description">
            Información general sobre los visitantes del sitio
        </x-slot>

        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <!-- Estadísticas principales -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                <!-- Total Visitantes -->
                <div style="background-color: rgb(var(--primary-50)); padding: 1.5rem; border-radius: 0.5rem; border: 1px solid rgb(var(--primary-200));" class="dark:!bg-primary-900/20 dark:!border-primary-800">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <p style="font-size: 0.875rem; font-weight: 500; color: rgb(var(--primary-600)); margin-bottom: 0.5rem;" class="dark:!text-primary-400">Total de Visitantes</p>
                            <p style="font-size: 1.875rem; font-weight: 700; color: rgb(var(--primary-900)); margin-top: 0.5rem;" class="dark:!text-primary-100">
                                {{ number_format($this->totalVisitors) }}
                            </p>
                        </div>
                        <div style="padding: 0.75rem; background-color: rgb(var(--primary-100)); border-radius: 9999px;" class="dark:!bg-primary-800">
                            <svg style="width: 2rem; height: 2rem; color: rgb(var(--primary-600));" class="dark:!text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Visitantes Únicos -->
                <div style="background-color: rgb(var(--success-50)); padding: 1.5rem; border-radius: 0.5rem; border: 1px solid rgb(var(--success-200));" class="dark:!bg-success-900/20 dark:!border-success-800">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <p style="font-size: 0.875rem; font-weight: 500; color: rgb(var(--success-600)); margin-bottom: 0.5rem;" class="dark:!text-success-400">Visitantes Únicos</p>
                            <p style="font-size: 1.875rem; font-weight: 700; color: rgb(var(--success-900)); margin-top: 0.5rem;" class="dark:!text-success-100">
                                {{ number_format($this->uniqueVisitors) }}
                            </p>
                        </div>
                        <div style="padding: 0.75rem; background-color: rgb(var(--success-100)); border-radius: 9999px;" class="dark:!bg-success-800">
                            <svg style="width: 2rem; height: 2rem; color: rgb(var(--success-600));" class="dark:!text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Páginas más visitadas -->
            @if(count($this->topVisitedPages) > 0)
            <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; border: 1px solid #e5e7eb;" class="dark:!bg-gray-800 dark:!border-gray-700">
                <h3 style="font-size: 1.125rem; font-weight: 600; color: #111827; margin-bottom: 1rem;" class="dark:!text-gray-100">Páginas Más Visitadas</h3>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    @foreach($this->topVisitedPages as $index => $page)
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 0.75rem; background-color: #f9fafb; border-radius: 0.5rem;" class="dark:!bg-gray-700/50 hover:!bg-gray-100 dark:hover:!bg-gray-700">
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <div style="flex-shrink: 0; width: 2rem; height: 2rem; background-color: rgb(var(--primary-100)); border-radius: 9999px; display: flex; align-items: center; justify-content: center; color: rgb(var(--primary-600)); font-weight: 600; font-size: 0.875rem;" class="dark:!bg-primary-900 dark:!text-primary-400">
                                    {{ $index + 1 }}
                                </div>
                                <div>
                                    <p style="font-weight: 500; color: #111827;" class="dark:!text-gray-100">
                                        {{ $page->page_title ?? 'Sin título' }}
                                    </p>
                                    <p style="font-size: 0.875rem; color: #6b7280; max-width: 28rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" class="dark:!text-gray-400">
                                        {{ $page->url }}
                                    </p>
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <p style="font-size: 0.875rem; font-weight: 600; color: #111827;" class="dark:!text-gray-100">
                                    {{ number_format($page->total) }}
                                </p>
                                <p style="font-size: 0.75rem; color: #6b7280;" class="dark:!text-gray-400">visitas</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Distribución por países -->
            @if(count($this->countries) > 0)
            <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; border: 1px solid #e5e7eb;" class="dark:!bg-gray-800 dark:!border-gray-700">
                <h3 style="font-size: 1.125rem; font-weight: 600; color: #111827; margin-bottom: 1rem;" class="dark:!text-gray-100">Distribución por Países</h3>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    @php
                        $totalCountryVisits = array_sum($this->countries);
                    @endphp
                    @foreach(array_slice($this->countries, 0, 5, true) as $country => $count)
                        @php
                            $percentage = $totalCountryVisits > 0 ? ($count / $totalCountryVisits) * 100 : 0;
                        @endphp
                        <div>
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.25rem;">
                                <span style="font-size: 0.875rem; font-weight: 500; color: #111827;" class="dark:!text-gray-100">{{ $country }}</span>
                                <span style="font-size: 0.875rem; color: #4b5563;" class="dark:!text-gray-400">
                                    {{ number_format($count) }} ({{ number_format($percentage, 1) }}%)
                                </span>
                            </div>
                            <div style="width: 100%; background-color: #e5e7eb; border-radius: 9999px; height: 0.5rem;" class="dark:!bg-gray-700">
                                <div style="background-color: rgb(var(--primary-600)); border-radius: 9999px; height: 0.5rem; transition: width 0.3s; width: {{ min(100, $percentage) }}%;" class="dark:!bg-primary-500"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Sistema operativo y dispositivos -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem;">
                @if(count($this->os) > 0)
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; border: 1px solid #e5e7eb;" class="dark:!bg-gray-800 dark:!border-gray-700">
                    <h3 style="font-size: 1.125rem; font-weight: 600; color: #111827; margin-bottom: 1rem;" class="dark:!text-gray-100">Sistemas Operativos</h3>
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        @php
                            $totalOS = array_sum($this->os);
                        @endphp
                        @foreach($this->os as $osName => $count)
                            @php
                                $percentage = $totalOS > 0 ? ($count / $totalOS) * 100 : 0;
                            @endphp
                            <div>
                                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.25rem;">
                                    <span style="font-size: 0.875rem; font-weight: 500; color: #111827;" class="dark:!text-gray-100">{{ $osName }}</span>
                                    <span style="font-size: 0.875rem; color: #4b5563;" class="dark:!text-gray-400">
                                        {{ number_format($count) }} ({{ number_format($percentage, 1) }}%)
                                    </span>
                                </div>
                                <div style="width: 100%; background-color: #e5e7eb; border-radius: 9999px; height: 0.5rem;" class="dark:!bg-gray-700">
                                    <div style="background-color: rgb(var(--warning-600)); border-radius: 9999px; height: 0.5rem; transition: width 0.3s; width: {{ min(100, $percentage) }}%;" class="dark:!bg-warning-500"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(count($this->devices) > 0)
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; border: 1px solid #e5e7eb;" class="dark:!bg-gray-800 dark:!border-gray-700">
                    <h3 style="font-size: 1.125rem; font-weight: 600; color: #111827; margin-bottom: 1rem;" class="dark:!text-gray-100">Dispositivos</h3>
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        @php
                            $totalDevices = array_sum($this->devices);
                        @endphp
                        @foreach($this->devices as $deviceName => $count)
                            @php
                                $percentage = $totalDevices > 0 ? ($count / $totalDevices) * 100 : 0;
                            @endphp
                            <div>
                                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.25rem;">
                                    <span style="font-size: 0.875rem; font-weight: 500; color: #111827;" class="dark:!text-gray-100">{{ $deviceName }}</span>
                                    <span style="font-size: 0.875rem; color: #4b5563;" class="dark:!text-gray-400">
                                        {{ number_format($count) }} ({{ number_format($percentage, 1) }}%)
                                    </span>
                                </div>
                                <div style="width: 100%; background-color: #e5e7eb; border-radius: 9999px; height: 0.5rem;" class="dark:!bg-gray-700">
                                    <div style="background-color: rgb(var(--success-600)); border-radius: 9999px; height: 0.5rem; transition: width 0.3s; width: {{ min(100, $percentage) }}%;" class="dark:!bg-success-500"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
