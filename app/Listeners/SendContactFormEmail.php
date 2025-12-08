<?php

namespace App\Listeners;

use App\Events\ContactFormSubmitted;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

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
    public function handle(ContactFormSubmitted $event): void
    {
        // Enviar correo al administrador
        Mail::to(config('mail.from.address'))
            ->send(new ContactFormMail(
                name: $event->name,
                email: $event->email,
                phone: $event->phone,
                subject: $event->subject,
                message: $event->message,
            ));
    }
}
