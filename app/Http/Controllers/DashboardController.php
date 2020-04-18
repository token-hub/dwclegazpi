<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\LoginTrait;
use App\Traits\LogoutTrait;

class DashboardController extends Controller
{ 

    use LoginTrait, LogoutTrait;

    public function getHome() {
         return view('dashboard.main.home');
    }
}
