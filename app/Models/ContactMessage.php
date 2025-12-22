<?php

namespace App\Models;

use App\Services\GoogleSheetsService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;

class ContactMessage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'uploaded_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    /**
     * Subir el mensaje de contacto a Google Sheets
     *
     * @return bool
     * @throws \Exception
     */
    public function uploadToGoogleSheets(): bool
    {
        // Si ya está subido, no hacer nada
        if ($this->uploaded_at !== null) {
            return true;
        }

        try {
            $googleSheetsService = app(GoogleSheetsService::class);

            // Preparar los datos para la fila
            $rowData = [
                $this->created_at->format('Y-m-d H:i:s'),
                $this->name,
                $this->email,
                $this->phone,
                $this->subject,
                $this->message,
            ];

            // Subir a Google Sheets
            $googleSheetsService->appendRow($rowData);

            // Marcar como subido
            $this->update([
                'uploaded_at' => now(),
            ]);

            Log::info('Contact message uploaded to Google Sheets', [
                'contact_message_id' => $this->id,
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to upload contact message to Google Sheets', [
                'contact_message_id' => $this->id,
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }
}
