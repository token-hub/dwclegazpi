<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function getIndex() {
    	return view('web.gallery.gallery');
    }
}
