<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegisterNotificationMail extends Notification implements ShouldQueue
{
    use Queueable;
    protected $user;
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Welcome to our website' . $this->user->name)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
