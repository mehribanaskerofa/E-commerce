<?php

namespace App\Observers;

use App\Jobs\SendEmailJob;
use App\Mail\UserRegistred;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
//    php artisan queue:work --queue=emails
    public function created(User $user): void
    {
        SendEmailJob::dispatch($user)->onQueue('emails');
//        Mail::to($user->mail)->queue(new UserRegistred($user));
    }


    public function updated(User $user): void
    {
        // ...
    }

    public function deleted(User $user): void
    {
        // ...
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        // ...
    }

    /**
     * Handle the User "forceDeleted" event.
     */
    public function forceDeleted(User $user): void
    {
        // ...
    }
}
