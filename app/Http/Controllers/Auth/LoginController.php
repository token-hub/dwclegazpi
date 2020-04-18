<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
   public function getLogin() {
        return view('dashboard.login.login-page');
    }

    public function postLogin(request $request) {

       $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard/home');
        } else {
            return redirect('/dashboard/login');
        }
    }
}
