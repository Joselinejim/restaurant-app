<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserPasswordGenerated extends Notification
{
    use Queueable;

    protected $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Tu nueva contraseña')
            ->greeting("Hola, {$notifiable->name}")
            ->line('El administrador ha generado una nueva contraseña para tu cuenta.')
            ->line('Tu nueva contraseña es:')
            ->line("**{$this->password}**")
            ->line('Por seguridad, te recomendamos cambiarla al iniciar sesión.')
            ->salutation('Restaurant Te-Pathé');
    }
}
