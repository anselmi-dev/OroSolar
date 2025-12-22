<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Actions;
use Filament\Support\Enums\IconPosition;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $navigationLabel = 'Mensajes de Contacto';

    protected static ?string $modelLabel = 'Mensaje de Contacto';

    protected static ?string $pluralModelLabel = 'Mensajes de Contacto';

    // protected static ?string $navigationGroup = 'Gestión';


    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return (string) ContactMessage::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'primary';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Información del Contacto')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('phone')
                            ->label('Teléfono')
                            ->tel()
                            ->maxLength(20)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('subject')
                            ->label('Asunto')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('message')
                            ->label('Mensaje')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('Información del Sistema')
                    ->schema([
                        Forms\Components\DateTimePicker::make('created_at')
                            ->label('Fecha de Creación')
                            ->disabled()
                            ->displayFormat('d/m/Y H:i'),

                        Forms\Components\DateTimePicker::make('updated_at')
                            ->label('Última Actualización')
                            ->disabled()
                            ->displayFormat('d/m/Y H:i'),

                        Forms\Components\DateTimePicker::make('uploaded_at')
                            ->label('Subido a Google Sheets')
                            ->disabled()
                            ->displayFormat('d/m/Y H:i'),

                        Forms\Components\DateTimePicker::make('admin_email_sent_at')
                            ->label('Email Enviado al Admin')
                            ->disabled()
                            ->displayFormat('d/m/Y H:i'),

                        Forms\Components\DateTimePicker::make('user_email_sent_at')
                            ->label('Email Enviado al Usuario')
                            ->disabled()
                            ->displayFormat('d/m/Y H:i'),
                    ])
                    ->columns(3)
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copiado')
                    ->icon('heroicon-m-envelope'),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Teléfono')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('subject')
                    ->label('Asunto')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->tooltip(fn (ContactMessage $record): string => $record->subject),

                Tables\Columns\IconColumn::make('uploaded_at')
                    ->label('Subido')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),

                Tables\Columns\IconColumn::make('admin_email_sent_at')
                    ->label('Email Admin')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('user_email_sent_at')
                    ->label('Email Usuario')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('uploaded_at')
                    ->label('Subido a Google Sheets')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('uploaded_at')),

                Tables\Filters\Filter::make('not_uploaded')
                    ->label('No Subido')
                    ->query(fn (Builder $query): Builder => $query->whereNull('uploaded_at')),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Desde'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Hasta'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Actions\ViewAction::make(),
                Actions\EditAction::make()->hidden(fn (ContactMessage $record): bool => $record->uploaded_at !== null),
                Actions\DeleteAction::make(),
                Actions\Action::make('upload_to_google_sheets')
                    ->label('Subir a Google Sheets')
                    ->icon('heroicon-o-cloud-arrow-up')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Subir a Google Sheets')
                    ->modalDescription('¿Estás seguro de que deseas subir este mensaje a Google Sheets?')
                    ->action(function (ContactMessage $record): void {
                        try {
                            $record->uploadToGoogleSheets();
                            \Filament\Notifications\Notification::make()
                                ->success()
                                ->title('Mensaje subido exitosamente')
                                ->body('El mensaje ha sido subido a Google Sheets.')
                                ->send();
                        } catch (\Exception $e) {
                            \Filament\Notifications\Notification::make()
                                ->danger()
                                ->title('Error al subir')
                                ->body('No se pudo subir el mensaje a Google Sheets: ' . $e->getMessage())
                                ->send();
                        }
                    })
                    ->visible(fn (ContactMessage $record): bool => $record->uploaded_at === null),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('30s');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'create' => Pages\CreateContactMessage::route('/create'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}

