<?php

namespace App\Listeners;

use App\Events\catatDataLogout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\TrafficLogin;

class Logout
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
    public function handle(catatDataLogout $event): void
    {
        TrafficLogin::create([
            'userID' => $event->userID,
            'logout' => now(),
        ]);
    }
}
