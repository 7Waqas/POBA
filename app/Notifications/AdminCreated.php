<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminCreated extends Notification
{
    use Queueable;

    public function __construct(private string $password) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $roleLabel = $notifiable->isSuperAdmin() ? 'Super Admin' : 'Admin';

        return (new MailMessage)
            ->subject('POBA Admin Panel — Your Account Has Been Created')
            ->greeting("Dear {$notifiable->name},")
            ->line("A {$roleLabel} account has been created for you on the POBA Admin Panel.")
            ->line('Here are your login credentials:')
            ->line("**Email:** {$notifiable->email}")
            ->line("**Temporary Password:** {$this->password}")
            ->action('Login to Admin Panel', url('/admin/dashboard'))
            ->line('Please log in and change your password as soon as possible.')
            ->line('Do not share these credentials with anyone.')
            ->salutation('POBA Portal System');
    }
}