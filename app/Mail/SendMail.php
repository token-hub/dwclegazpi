<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(request $request)
    {
        return $this->view('EmailPage.email', 
        	[
        		'name' => $request->name,
        		'email' => $request->email,
        		'number' => $request->number,
        		'subject' => $request->subject,
        		'msg' => $request->message
        	]
        )->to('johnsuyang2118@gmail.com');
    }
}
