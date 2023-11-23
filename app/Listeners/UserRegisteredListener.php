<?php

namespace App\Listeners;

use App\Mail\UserRegistred;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserRegisteredListener
{
    /**
     * Create the event listener.
     */
    public function __construct(protected $user)
    {
        //


        //nmkl
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Mail::to($this->user->mail)->send(new UserRegistred($this->user));
    }
}
