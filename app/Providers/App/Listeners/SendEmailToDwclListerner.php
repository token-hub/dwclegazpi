<?php

namespace App\Providers\App\Listeners;

use App\Events\NewEmailFromUserToDWCLEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailToDwclListerner
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

    /**
     * Handle the event.
     *
     * @param  NewEmailFromUserToDWCLEvent  $event
     * @return void
     */
    public function handle(NewEmailFromUserToDWCLEvent $event)
    {
        //
    }
}
