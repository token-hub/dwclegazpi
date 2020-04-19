<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Traits\LogTrait;

class LoginController extends Controller
{
    use LogTrait;

    public function getLogin() {
        return view('dashboard.login.login-page');
    }

    public function postLogin(LoginRequest $LoginRequest) {

        if (Auth::attempt($LoginRequest->only('username', 'password'), $LoginRequest->remember)) {
            $this->log();
            
            $notification = ['message' => 'Welcome to Dashboard!', 'type' => 'notif-success'];
            return redirect('/dashboard/home')->with('notification', $notification);
        } 

        return redirect('/dashboard/login');
    }

    public function postLogout() {     
        $this->log('out');
        Auth::logout();

        $notification = ['message' => 'Successfully logged out.', 'type' => 'notif-success'];
        return redirect('dashboard/login')->with('notification', $notification);
    }
}
