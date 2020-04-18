<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Events\NewEmailFromUserToDWCLEvent;
use Illuminate\Support\facades\Mail;
use App\Mail\SendMail;

class EmailController extends Controller
{
    public function postSend(EmailRequest $request) {

    	event(new NewEmailFromUserToDWCLEvent($request->all()));
  	    return redirect('contact-us')->with('notification', ['message' => 'Message successfull sent!', 'type' => 'notif-success']);
    }
}
