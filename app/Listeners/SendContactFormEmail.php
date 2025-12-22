<?php

namespace App\Listeners;

use App\Events\ContactFormSubmitted;
use App\Mail\ContactFormMail;
use App\Mail\ContactConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendContactFormEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactFormSubmitted $event, ?string $adminEmail = null): void
    {
        if (is_null($adminEmail))
            $adminEmail = app()->environment('production') ? config('mail.from.address') : 'carlosanselmi2@gmail.com';

        // Enviar correo al administrador
        try {
            Mail::to($adminEmail)
                ->send(new ContactFormMail(
                    $event->contactMessage,
                ));

            // Marcar fecha de envío al administrador
            $event->contactMessage->update([
                'admin_email_sent_at' => now(),
            ]);

            Log::info("Message sent to admin", [
                'contact_message_id' => $event->contactMessage->id,
            ]);
        } catch (\Exception $e) {
            Log::error('Error al enviar correo al administrador', [
                'contact_message_id' => $event->contactMessage->id,
                'error' => $e->getMessage(),
            ]);
        }

        // Enviar correo de confirmación al usuario
        try {
            Mail::to($event->contactMessage->email)
                ->send(new ContactConfirmationMail(
                    $event->contactMessage,
                ));

            // Marcar fecha de envío al usuario
            $event->contactMessage->update([
                'user_email_sent_at' => now(),
            ]);

            Log::info("Message sent to user", [
                'contact_message_id' => $event->contactMessage->id,
            ]);
        } catch (\Exception $e) {
            Log::error('Error al enviar correo de confirmación al usuario', [
                'contact_message_id' => $event->contactMessage->id,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
