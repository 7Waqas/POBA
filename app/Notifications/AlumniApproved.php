<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AlumniApproved extends Notification
{
    use Queueable;

    public function __construct(private string $password) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to POBA Alumni Portal — Account Approved!')
            ->greeting("Dear {$notifiable->full_name},")
            ->line('Congratulations! Your application to the POBA Alumni Portal has been approved.')
            ->line('Here are your login credentials:')
            ->line("**Email:** {$notifiable->email}")
            ->line("**Temporary Password:** {$this->password}")
            ->action('Login to Portal', url('/login'))
            ->line('Please log in and change your password immediately from your profile settings.')
            ->line('Welcome to the Palandarians\' Old Boys\' Association!')
            ->salutation('Best regards, POBA Team');
    }
}