<?php

namespace App\Listeners;

use App\Mail\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToDwclListerner implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        sleep(5);

        Mail::to('johnsuyang2118@gmail.com')->send(new SendMail($event->dwclEmail));
    }
}
