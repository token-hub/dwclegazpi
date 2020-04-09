<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
   public function getIndex() {
   		return view('web.contact-us.contactUs');
   }
}
