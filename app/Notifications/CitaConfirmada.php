<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CitaConfirmada extends Notification
{
    use Queueable;

    public $cita;

    /**
     * Create a new notification instance.
     */
    public function __construct($cita)
    {
        $this->cita = $cita; // Guardar la cita en la propiedad
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database']; // Canales de entrega de la notificación
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Cita Confirmada') // Asunto del correo
            ->greeting('Hola ' . $notifiable->name) // Saludo
            ->line('Su cita ha sido confirmada para el ' . $this->cita->fecha . ' a las ' . $this->cita->hora) // Mensaje
            ->action('Ver Cita', url('/citas/' . $this->cita->id)) // Enlace a la cita
            ->line('Gracias por usar nuestra aplicación!'); // Mensaje de agradecimiento
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "mensaje" => 'tu cita para el'. $this->cita->fecha
            //
        ];
    }
}
