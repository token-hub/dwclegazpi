<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function getIndex() {
    	return view('web.alumni.alumni');
    }
}
