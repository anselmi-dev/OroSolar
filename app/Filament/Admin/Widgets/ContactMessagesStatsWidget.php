<?php

namespace App\Filament\Admin\Widgets;

use App\Models\ContactMessage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContactMessagesStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalMessages = ContactMessage::count();
        $todayMessages = ContactMessage::whereDate('created_at', today())->count();
        $uploadedMessages = ContactMessage::whereNotNull('uploaded_at')->count();
        $pendingUpload = ContactMessage::whereNull('uploaded_at')->count();

        return [
            Stat::make('Total de Mensajes', $totalMessages)
                ->description('Todos los mensajes recibidos')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('primary')
                ->chart([7, 3, 4, 5, 6, 3, 5]),

            Stat::make('Mensajes de Hoy', $todayMessages)
                ->description('Recibidos hoy')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success'),

            Stat::make('Subidos a Google Sheets', $uploadedMessages)
                ->description('Mensajes sincronizados')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Pendientes de Subir', $pendingUpload)
                ->description('Sin sincronizar')
                ->descriptionIcon('heroicon-m-clock')
                ->color($pendingUpload > 0 ? 'warning' : 'success'),
        ];
    }
}

