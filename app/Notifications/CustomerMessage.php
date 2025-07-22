<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomerMessage extends Notification
{
    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function via($notifiable)
    {
        return ['mail']; // you can add sms, database, etc. here later
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->details['subject'])
                    ->line($this->details['message']);
    }
}
