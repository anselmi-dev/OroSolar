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
        Mail::to(config('mail.from.address'))
            ->send(new ContactFormMail(
                name: $event->contactMessage->name,
                email: $event->contactMessage->email,
                phone: $event->contactMessage->phone,
                subject: $event->contactMessage->subject,
                message: $event->contactMessage->message,
            ));
    }
}
