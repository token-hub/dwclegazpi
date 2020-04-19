<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{ 
    public function getHome() {
        return view('dashboard.main.home');
    }
}
