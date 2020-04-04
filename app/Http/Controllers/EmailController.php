<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\mail\sendMail;

class EmailController extends Controller
{
    public function send() {
      Mail::send(new sendMail());
  	  return redirect('contact-us')->with('notification', ['message' => 'Successfull sent!', 'type' => 'success']);
    }
}
