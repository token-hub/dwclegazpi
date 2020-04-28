<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DashboardImagesController extends Controller
{
    public function active()
    {
    	return view('dashboard.main.active-images');
    }

    public function inactive()
    {
    	return view('dashboard.main.inactive-images');
    }
}
