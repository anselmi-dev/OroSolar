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
        $email = app()->environment('production') ? config('mail.from.address') : 'carlosanselmi2@gmail.com';

        logger($email);

        Mail::to($email)
            ->send(new ContactFormMail(
                $event->contactMessage,
            ));
    }
}
