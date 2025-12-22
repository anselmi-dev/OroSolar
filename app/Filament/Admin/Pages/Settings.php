<?php

namespace App\Filament\Admin\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Actions;
use BackedEnum;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected string $view = 'filament.admin.pages.settings';

    protected static ?string $navigationLabel = 'Configuración';

    protected static ?string $title = 'Configuración';

    protected static ?string $slug = 'settings';

    protected static ?int $navigationSort = 10;

    public ?array $data = [];

    public function mount(): void
    {
        $color = Setting::get('color', '#F7A826');

        $favicon = Setting::get('favicon');

        $phone = Setting::get('phone');

        $email = Setting::get('email');

        $address = Setting::get('address');

        $schedule = Setting::get('schedule');

        $this->form->fill([
            'color' => $color,
            'favicon' => $favicon,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'schedule' => $schedule,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Configuración de Color')
                    ->description('Selecciona el color principal de la aplicación')
                    ->schema([
                        Forms\Components\ColorPicker::make('color')
                            ->label('Color Principal')
                            ->default('#F7A826')
                            ->helperText('Este color se utilizará como color principal en toda la aplicación'),
                    ])
                    ->columns(1),

                \Filament\Schemas\Components\Section::make('Configuración de Contacto')
                    ->description('Configuración de contacto para tu sitio web')
                    ->schema([
                        Forms\Components\TextInput::make('phone')
                            ->label('Teléfono')
                            ->maxLength(20)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('address')
                            ->label('Dirección')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('schedule')
                            ->label('Horario')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),

                \Filament\Schemas\Components\Section::make('Configuración de Favicon')
                    ->description('Sube un favicon para tu sitio web (formato recomendado: .ico, .png o .svg)')
                    ->schema([
                        Forms\Components\FileUpload::make('favicon')
                            ->label('Favicon')
                            ->image()
                            ->directory('favicons')
                            ->disk('public')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/png', 'image/x-icon', 'image/svg+xml', 'image/jpeg'])
                            ->maxSize(512) // 512 KB
                            ->helperText('Formatos aceptados: .ico, .png, .svg, .jpg. Tamaño máximo: 512 KB')
                            ->imagePreviewHeight('64')
                            ->downloadable()
                            ->openable()
                            ->deletable()
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Setting::set('color', $data['color']);

        // Guardar o eliminar favicon
        if (isset($data['favicon'])) {
            if ($data['favicon']) {
                // Nuevo favicon subido
                Setting::set('favicon', $data['favicon']);
            } else {
                // Favicon eliminado
                $oldFavicon = Setting::get('favicon');
                if ($oldFavicon && Storage::disk('public')->exists($oldFavicon)) {
                    Storage::disk('public')->delete($oldFavicon);
                }
                Setting::where('key', 'favicon')->delete();
            }
        }

        Notification::make()
            ->success()
            ->title('Configuración guardada')
            ->body('La configuración se ha actualizado correctamente.')
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Actions\Action::make('save')
                ->label('Guardar')
                ->submit('save'),
        ];
    }
}

