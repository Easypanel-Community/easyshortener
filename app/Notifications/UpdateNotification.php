<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateNotification extends Notification
{
    use Queueable;

    protected $latestVersion;

    public function __construct($latestVersion)
    {
        $this->latestVersion = $latestVersion;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $releaseUrl = 'https://github.com/Easypanel-Community/Easyshortener/releases/tag/' . $this->latestVersion;

        return (new MailMessage)
            ->subject('Easyshortener Update Notification')
            ->greeting('Hello!')
            ->line('A new version of Easyshortener is available: ' . $this->latestVersion)
            ->action('View Release Details', $releaseUrl)
            ->line('Thank you for using Easyshortener!')
            ->line('');
    }
}
