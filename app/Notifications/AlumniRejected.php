<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AlumniRejected extends Notification
{
    use Queueable;

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('POBA Alumni Portal — Application Update')
            ->greeting("Dear {$notifiable->full_name},")
            ->line('Thank you for your interest in joining the POBA Alumni Portal.')
            ->line('After reviewing your application, we were unable to approve your registration at this time.')
            ->line('If you believe this is an error or would like to provide additional information, please contact us directly.')
            ->action('Contact Us', url('/contact'))
            ->salutation('Best regards, POBA Team');
    }
}