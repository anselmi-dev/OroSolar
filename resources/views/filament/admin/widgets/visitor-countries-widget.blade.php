<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Visitantes por País
        </x-slot>

        <x-slot name="description">
            Distribución de visitantes según su país de origen
        </x-slot>

        <div class="space-y-4">
            <div class="overflow-x-auto">
                <table class="fi-ta-table">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="fi-ta-header-cell">
                                País
                            </th>
                            <th class="fi-ta-header-cell">
                                Total de Visitantes
                            </th>
                            <th class="fi-ta-header-cell">
                                Porcentaje
                            </th>
                            {{-- <th class="fi-ta-header-cell">
                                Visualización
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($this->countries as $country)
                            @php
                                $percentage = $this->totalVisitors > 0 ? ($country->total / $this->totalVisitors) * 100 : 0;
                                $barWidth = min(100, max(5, $percentage));
                            @endphp
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="fi-ta-cell">
                                    <div class="fi-size-sm  fi-ta-text-item  fi-ta-text">
                                        {{ $country->country ?? 'Desconocido' }}
                                    </div>
                                </td>
                                <td class="fi-ta-cell">
                                    <div class="fi-size-sm  fi-ta-text-item  fi-ta-text">
                                        {{ number_format($country->total) }}
                                    </div>
                                </td>
                                <td class="fi-ta-cell">
                                    <div class="fi-size-sm  fi-ta-text-item  fi-ta-text">
                                        {{ number_format($percentage, 2) }}%
                                    </div>
                                </td>
                                {{-- <td class="fi-ta-cell">
                                    <div class="fi-size-sm  fi-ta-text-item  fi-ta-text">
                                        <div class="bg-primary-600 dark:bg-primary-500 h-2.5 rounded-full transition-all duration-300"
                                             style="width: {{ $barWidth }}%"></div>
                                    </div>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                    No hay datos de países disponibles
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
