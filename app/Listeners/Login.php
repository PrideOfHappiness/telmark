<?php

namespace App\Listeners;

use App\Events\catatDataLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\TrafficLogin;

class Login
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
    public function handle(catatDataLogin $event): void
    {
        TrafficLogin::create([
            'userID' => $event->userID,
            'login' => $event->loginTime,
        ]);
    }
}
