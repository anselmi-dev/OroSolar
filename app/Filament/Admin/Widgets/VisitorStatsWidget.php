<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;
use MonishRoy\VisitorTracking\Helpers\Visitor;
use Livewire\Attributes\Computed;

class VisitorStatsWidget extends Widget
{
    protected string $view = 'filament.admin.widgets.visitor-stats-widget';

    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full';

    #[Computed]
    public function totalVisitors()
    {
        return Visitor::totalVisitors();
    }

    #[Computed]
    public function uniqueVisitors()
    {
        return Visitor::uniqueVisitors();
    }

    #[Computed]
    public function topVisitedPages()
    {
        return Visitor::topVisitedPages(5);
    }

    #[Computed]
    public function countries()
    {
        $countries = Visitor::countries();
        $result = [];
        foreach ($countries as $country) {
            $result[$country->country ?? 'Desconocido'] = $country->total;
        }
        return $result;
    }

    #[Computed]
    public function os()
    {
        $os = Visitor::os();
        $result = [];
        foreach ($os as $operatingSystem) {
            $result[$operatingSystem->os ?? 'Desconocido'] = $operatingSystem->total;
        }
        return $result;
    }

    #[Computed]
    public function devices()
    {
        $devices = Visitor::devices();
        $result = [];
        foreach ($devices as $device) {
            $result[$device->device ?? 'Desconocido'] = $device->total;
        }
        return $result;
    }
}

