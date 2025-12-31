<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;
use MonishRoy\VisitorTracking\Models\VisitorTable;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;

class VisitorCountriesWidget extends Widget
{
    protected string $view = 'filament.admin.widgets.visitor-countries-widget';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    #[Computed]
    public function countries()
    {
        // Usar subconsulta SQL raw para evitar problemas con GROUP BY en MySQL
        $subquery = "(SELECT country, COUNT(*) as total
                      FROM visitors
                      WHERE country IS NOT NULL
                      GROUP BY country) as country_stats";

        return DB::table(DB::raw($subquery))
            ->orderBy('total', 'desc')
            ->get();
    }

    #[Computed]
    public function totalVisitors()
    {
        return VisitorTable::count();
    }
}

