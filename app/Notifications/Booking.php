<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Booking extends Notification
{
    use Queueable;

    private $booking_id;
    public function __construct($booking_id)
    {
        $this->booking_id = $booking_id;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }



    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'Booking',

            'booking_id' => $this->booking_id,
        ];
    }
}
