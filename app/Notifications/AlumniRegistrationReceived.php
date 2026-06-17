<?php

namespace App\Notifications;

use App\Models\AlumniUser;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AlumniRegistrationReceived extends Notification
{
    use Queueable;

    public function __construct(private AlumniUser $alumni) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Alumni Registration — Action Required')
            ->greeting("Dear {$notifiable->name},")
            ->line('A new alumni has submitted a registration application and is awaiting your review.')
            ->line("**Name:** {$this->alumni->full_name}")
            ->line("**Email:** {$this->alumni->email}")
            ->line("**CCP No:** {$this->alumni->ccp_no}")
            ->line("**Entry:** {$this->alumni->entry}")
            ->action('Review Application', url("/admin/alumni/{$this->alumni->id}"))
            ->salutation('POBA Portal System');
    }
}