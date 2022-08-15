<?php

namespace App\Listeners;

use App\Events\PodcastProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserRegisterEvent;
use App\Notifications\UserRegisterNotificationMail;
use Illuminate\Support\Facades\Notification;

class SendMailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function handle(UserRegisterEvent $event)
    {
        Notification::send($event->user, new UserRegisterNotificationMail($event->user));
    }
}
