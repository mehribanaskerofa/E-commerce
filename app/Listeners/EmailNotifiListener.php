<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use App\Mail\UserRegistred;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailNotifiListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegisteredEvent $event): void
    {
        Mail::to($event->user->mail)->send(new UserRegistred($event->user));

    }
}
