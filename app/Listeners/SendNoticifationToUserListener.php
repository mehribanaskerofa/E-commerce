<?php

namespace App\Listeners;

use App\Mail\UserRegistred;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNoticifationToUserListener
{
    /**
     * Create the event listener.
     */
    public function __construct(protected $user)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Mail::to($user->mail)->send(new UserRegistred($user));
    }
}
