<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Calls extends Notification
{
    use Queueable;

    private $call_id;
    private $type;

    public function __construct($call_id, $type = 'Call Request')
    {
        $this->call_id = $call_id;
        $this->type = $type;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => $this->type,
            'call_id' => $this->call_id,
        ];
    }
}
