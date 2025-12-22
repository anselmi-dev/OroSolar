<?php

namespace App\Livewire;

use App\Services\SeoService;
use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.web')]
class Faqs extends Component
{
    public $openIndex = null;

    public function toggle($index)
    {
        $this->openIndex = $this->openIndex === $index ? null : $index;
    }

    public function getFaqsProperty()
    {
        return [
            [
                'question' => '¿Qué es la energía solar y cómo funciona?',
                'answer' => 'La energía solar es una fuente de energía renovable que se obtiene del sol mediante paneles solares. Estos paneles capturan la luz solar y la convierten en electricidad mediante células fotovoltaicas. La energía generada puede usarse inmediatamente o almacenarse en baterías para uso posterior.'
            ],
            [
                'question' => '¿Cuánto cuesta instalar un sistema de paneles solares?',
                'answer' => 'El costo de instalación de paneles solares varía según el tamaño del sistema, la ubicación y las necesidades energéticas de cada hogar o negocio. Ofrecemos evaluaciones gratuitas para determinar el sistema más adecuado y proporcionar un presupuesto personalizado. Generalmente, los sistemas se amortizan en 5-7 años.'
            ],
            [
                'question' => '¿Cuánto tiempo dura la instalación de paneles solares?',
                'answer' => 'La instalación típica de un sistema de paneles solares residencial toma entre 1 a 3 días, dependiendo del tamaño del sistema y la complejidad del proyecto. Nuestro equipo de instaladores certificados trabaja de manera eficiente para minimizar cualquier inconveniente.'
            ],
            [
                'question' => '¿Necesito mantenimiento para mis paneles solares?',
                'answer' => 'Los paneles solares requieren muy poco mantenimiento. Recomendamos una limpieza periódica (2-4 veces al año) y una inspección anual para asegurar el máximo rendimiento. La mayoría de los sistemas incluyen garantías de 20-25 años.'
            ],
            [
                'question' => '¿Funcionan los paneles solares en días nublados?',
                'answer' => 'Sí, los paneles solares pueden generar electricidad incluso en días nublados, aunque con menor eficiencia. Los paneles modernos capturan tanto la luz directa como la luz difusa. En días completamente soleados, generan su máxima capacidad.'
            ],
            [
                'question' => '¿Qué beneficios ambientales tiene la energía solar?',
                'answer' => 'La energía solar es completamente limpia y no produce emisiones de gases de efecto invernadero. Al usar energía solar, reduces significativamente tu huella de carbono y contribuyes a combatir el cambio climático. Un sistema típico puede evitar la emisión de varias toneladas de CO2 al año.'
            ],
            [
                'question' => '¿Puedo vender el exceso de energía a la red eléctrica?',
                'answer' => 'Sí, en muchos lugares existe la posibilidad de conectar tu sistema a la red eléctrica mediante un sistema de medición neta (net metering). Esto te permite vender el exceso de energía que generas y recibir créditos en tu factura eléctrica.'
            ],
            [
                'question' => '¿Qué garantías ofrecen en sus sistemas?',
                'answer' => 'Ofrecemos garantías completas que incluyen: garantía de rendimiento de los paneles (25 años), garantía del inversor (10-15 años), y garantía de mano de obra en la instalación (5-10 años). Todos nuestros productos provienen de fabricantes reconocidos internacionalmente.'
            ]
        ];
    }

    public function render()
    {
        $meta = seo('faqs');

        return view('livewire.faqs')
            ->with(['title' => $meta->title]);
    }
}

