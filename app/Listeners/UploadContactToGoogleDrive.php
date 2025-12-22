<?php

namespace App\Listeners;

use App\Events\ContactFormSubmitted;
use App\Services\GoogleSheetsService;
use Illuminate\Support\Facades\Log;

class UploadContactToGoogleDrive
{
    /**
     * Create the event listener.
     */
    public function __construct(
        protected GoogleSheetsService $googleSheetsService
    ) {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactFormSubmitted $event): void
    {
        try {
            $contactMessage = $event->contactMessage;

            // Preparar los datos para la fila
            $rowData = [
                $contactMessage->created_at->format('Y-m-d H:i:s'),
                $contactMessage->name,
                $contactMessage->email,
                $contactMessage->phone,
                $contactMessage->subject,
                $contactMessage->message,
            ];

            // Subir a Google Sheets
            $this->googleSheetsService->appendRow($rowData);

            // Marcar como subido
            $contactMessage->update([
                'uploaded_at' => now(),
            ]);

            Log::info('Contact message uploaded to Google Drive', [
                'contact_message_id' => $contactMessage->id,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to upload contact message to Google Drive', [
                'contact_message_id' => $event->contactMessage->id,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
