<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Jobs\SendEmail;

class EmailController extends Controller
{
    public function postSend(EmailRequest $request) {
    	
    	SendEmail::dispatch($request->all());
  	    return redirect('contact-us')->with('notification', ['message' => 'Message successfull sent!', 'type' => 'notif-success']);
    }
}
