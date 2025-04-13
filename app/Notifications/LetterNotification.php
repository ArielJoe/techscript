<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class LetterNotification extends Notification
{
    use Queueable;

    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database']; // Notifikasi disimpan di database
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
            'url' => url('/dashboard'), // Opsional: URL untuk aksi
        ];
    }
}
