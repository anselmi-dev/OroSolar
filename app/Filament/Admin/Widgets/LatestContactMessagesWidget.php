<?php

namespace App\Filament\Admin\Widgets;

use App\Filament\Admin\Resources\ContactMessageResource;
use App\Models\ContactMessage;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Actions;

class LatestContactMessagesWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected static bool $isLazy = false;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ContactMessage::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Email copiado')
                    ->icon('heroicon-m-envelope'),

                Tables\Columns\TextColumn::make('subject')
                    ->label('Asunto')
                    ->searchable()
                    ->limit(40)
                    ->tooltip(fn (ContactMessage $record): string => $record->subject),

                Tables\Columns\IconColumn::make('uploaded_at')
                    ->label('Subido')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->heading('Últimos Mensajes de Contacto')
            ->description('Los 5 mensajes más recientes recibidos')
            ->defaultSort('created_at', 'desc')
            ->paginated(false)
            ->headerActions([
                Actions\Action::make('view_all')
                    ->label('Ver más')
                    ->icon('heroicon-o-arrow-right')
                    ->url(ContactMessageResource::getUrl('index'))
                    ->color('primary'),
            ]);
    }
}

