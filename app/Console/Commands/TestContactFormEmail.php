<?php

namespace App\Console\Commands;

use App\Events\ContactFormSubmitted;
use App\Models\ContactMessage;
use Illuminate\Console\Command;

class TestContactFormEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:test-email
                            {--id= : ID específico del mensaje de contacto a usar}
                            {--admin-email= : Email del administrador para enviar el correo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Probar el envío de correos de contacto usando un ContactMessage aleatorio o específico';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🚀 Iniciando prueba de envío de correos de contacto...');
        $this->newLine();

        // Obtener o crear un ContactMessage
        $contactMessage = $this->getContactMessage();

        if (!$contactMessage) {
            $this->error('❌ No se pudo obtener o crear un mensaje de contacto.');
            return Command::FAILURE;
        }

        // Mostrar información del mensaje
        $this->displayContactMessageInfo($contactMessage);
        $this->newLine();

        // Confirmar antes de enviar
        if (!$this->confirm('¿Deseas enviar los correos?', true)) {
            $this->warn('Operación cancelada.');
            return Command::SUCCESS;
        }

        $this->newLine();
        $this->info('📧 Enviando correos...');
        $this->newLine();

        try {
            // Obtener email de admin si se proporcionó
            $adminEmail = $this->option('admin-email');

            // Si se proporcionó un email de admin, llamar directamente al listener
            if ($adminEmail) {
                $this->info("📬 Usando email de admin personalizado: {$adminEmail}");
                $listener = app(\App\Listeners\SendContactFormEmail::class);
                $listener->handle(new ContactFormSubmitted($contactMessage), $adminEmail);
            } else {
                // Disparar el evento normalmente
                event(new ContactFormSubmitted($contactMessage));
            }

            // Recargar el modelo para ver los cambios
            $contactMessage->refresh();

            $this->newLine();
            $this->info('✅ Proceso completado!');
            $this->newLine();

            // Mostrar resultados
            $this->displayResults($contactMessage);

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('❌ Error al enviar correos: ' . $e->getMessage());
            $this->error('Stack trace: ' . $e->getTraceAsString());
            return Command::FAILURE;
        }
    }

    /**
     * Obtener un ContactMessage aleatorio o específico
     */
    protected function getContactMessage(): ?ContactMessage
    {
        $id = $this->option('id');

        if ($id) {
            $contactMessage = ContactMessage::find($id);

            if (!$contactMessage) {
                $this->error("No se encontró un mensaje de contacto con ID: {$id}");
                return null;
            }

            return $contactMessage;
        }

        // Intentar obtener un mensaje aleatorio
        $contactMessage = ContactMessage::inRandomOrder()->first();

        if (!$contactMessage) {
            $this->warn('No hay mensajes de contacto en la base de datos.');

            if ($this->confirm('¿Deseas crear un mensaje de prueba?', true)) {
                return $this->createTestContactMessage();
            }

            return null;
        }

        return $contactMessage;
    }

    /**
     * Crear un mensaje de contacto de prueba
     */
    protected function createTestContactMessage(): ContactMessage
    {
        $this->info('Creando mensaje de contacto de prueba...');

        return ContactMessage::create([
            'name' => 'Usuario de Prueba',
            'email' => 'test@example.com',
            'phone' => '+56912345678',
            'subject' => 'Mensaje de Prueba desde Comando',
            'message' => 'Este es un mensaje de prueba generado automáticamente para probar el envío de correos.',
        ]);
    }

    /**
     * Mostrar información del mensaje de contacto
     */
    protected function displayContactMessageInfo(ContactMessage $contactMessage): void
    {
        $this->table(
            ['Campo', 'Valor'],
            [
                ['ID', $contactMessage->id],
                ['Nombre', $contactMessage->name],
                ['Email', $contactMessage->email],
                ['Teléfono', $contactMessage->phone],
                ['Asunto', $contactMessage->subject],
                ['Mensaje', substr($contactMessage->message, 0, 50) . '...'],
                ['Creado', $contactMessage->created_at->format('d/m/Y H:i:s')],
            ]
        );
    }

    /**
     * Mostrar resultados del envío
     */
    protected function displayResults(ContactMessage $contactMessage): void
    {
        $this->info('📊 Estado de envíos:');
        $this->newLine();

        $results = [
            ['Tipo', 'Estado', 'Fecha'],
            [
                'Email al Admin',
                $contactMessage->admin_email_sent_at ? '✅ Enviado' : '❌ No enviado',
                $contactMessage->admin_email_sent_at ? $contactMessage->admin_email_sent_at->format('d/m/Y H:i:s') : 'N/A',
            ],
            [
                'Email al Usuario',
                $contactMessage->user_email_sent_at ? '✅ Enviado' : '❌ No enviado',
                $contactMessage->user_email_sent_at ? $contactMessage->user_email_sent_at->format('d/m/Y H:i:s') : 'N/A',
            ],
        ];

        $this->table($results[0], array_slice($results, 1));

        if ($contactMessage->admin_email_sent_at && $contactMessage->user_email_sent_at) {
            $this->newLine();
            $this->info('✨ Ambos correos fueron enviados exitosamente!');
        } elseif ($contactMessage->admin_email_sent_at || $contactMessage->user_email_sent_at) {
            $this->newLine();
            $this->warn('⚠️  Solo uno de los correos fue enviado. Revisa los logs para más detalles.');
        } else {
            $this->newLine();
            $this->error('❌ Ningún correo fue enviado. Revisa los logs para más detalles.');
        }
    }
}
