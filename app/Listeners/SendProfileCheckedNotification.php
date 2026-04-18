<?php

namespace App\Listeners;

use App\Events\SomeoneCheckedProfile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProfileCheckedNotification
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
    public function handle(SomeoneCheckedProfile $event): void
    {
        //
    }
}
