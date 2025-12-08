@component('mail::message')
# Nuevo mensaje de contacto

Has recibido un nuevo mensaje a través del formulario de contacto.

**Nombre:** {{ $name }}

**Email:** {{ $email }}

**Teléfono:** {{ $phone }}

**Asunto:** {{ $subject }}

**Mensaje:**

{{ $message }}

---

Este mensaje fue enviado desde el formulario de contacto de {{ config('app.name') }}.

@component('mail::button', ['url' => 'mailto:' . $email])
Responder al contacto
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
