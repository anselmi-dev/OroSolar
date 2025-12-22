@component('mail::message')
# ¡Hemos recibido tu mensaje!

Hola {{ $name }},

Gracias por contactarnos. Hemos recibido tu mensaje y nos pondremos en contacto contigo lo antes posible.

**Resumen de tu consulta:**

**Asunto:** {{ $subject }}

**Tu mensaje:**
{{ $message }}

---

Nuestro equipo revisará tu solicitud y te responderá a la brevedad posible. Si tienes alguna pregunta urgente, no dudes en contactarnos directamente.

Gracias por tu interés en {{ config('app.name') }}.

Saludos cordiales,<br>
El equipo de {{ config('app.name') }}

@component('mail::button', ['url' => route('contact')])
Volver al sitio web
@endcomponent
@endcomponent

