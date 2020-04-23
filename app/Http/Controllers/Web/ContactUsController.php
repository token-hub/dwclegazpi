<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
   public function getIndex() {
   		return view('web.contact-us.contactUs');
   }
}
