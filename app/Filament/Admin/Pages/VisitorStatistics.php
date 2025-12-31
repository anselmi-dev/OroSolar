<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\VisitorCountriesWidget;
use App\Filament\Admin\Widgets\VisitorStatsWidget;
// use App\Filament\Admin\Widgets\VisitorDailyStatsWidget;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class VisitorStatistics extends Page
{
    protected static string | \BackedEnum | null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static ?string $navigationLabel = 'Estadísticas de Visitantes';

    protected static ?string $title = 'Estadísticas de Visitantes';

    protected static ?string $slug = 'visitor-statistics';

    protected static ?int $navigationSort = 5;

    protected function getHeaderWidgets(): array
    {
        return [
            VisitorStatsWidget::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            VisitorCountriesWidget::class,
        ];
    }
}

