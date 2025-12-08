<?php

namespace App\Livewire;

use App\Events\ContactFormSubmitted;
use Livewire\Component;

class Contact extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $subject = '';
    public $message = '';
    public $success = false;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'subject' => ['required', 'string', 'min:3', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener al menos 2 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ser un correo electrónico válido.',
            'phone.required' => 'El teléfono es obligatorio.',
            'subject.required' => 'El asunto es obligatorio.',
            'subject.min' => 'El asunto debe tener al menos 3 caracteres.',
            'message.required' => 'El mensaje es obligatorio.',
            'message.min' => 'El mensaje debe tener al menos 10 caracteres.',
        ];
    }

    public function submit()
    {
        $this->validate();

        // Disparar el evento
        event(new ContactFormSubmitted(
            name: $this->name,
            email: $this->email,
            phone: $this->phone,
            subject: $this->subject,
            message: $this->message,
        ));

        // Limpiar el formulario
        $this->reset(['name', 'email', 'phone', 'subject', 'message']);

        // Mostrar mensaje de éxito
        $this->success = true;

        // Ocultar el mensaje después de 5 segundos
        $this->dispatch('contact-form-submitted');
    }

    public function render()
    {
        return view('livewire.contact')->layout('components.layouts.web');
    }
}

