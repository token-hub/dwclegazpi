<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function getIndex() {
    	return view('web.career.career');
    }
}
