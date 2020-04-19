<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Traits\LogTrait;
use Session;

class LoginController extends Controller
{
    use LogTrait;

    protected $redirectTo = '/dashboard/home';

    public function getLogin() {
        return view('dashboard.login.login-page');
    }

    public function postLogin(LoginRequest $LoginRequest) {
        
        if (Auth::attempt($LoginRequest->only('username', 'password'), $LoginRequest->remember)) {
            $user = Auth::getLastAttempted();
            
            # check if user is active
            if ($user->is_active) {
                $this->log();
                Auth::login($user, $LoginRequest->has('remember'));
                $notification = ['message' => 'Welcome to Dashboard!', 'type' => 'notif-success'];
                return redirect('dashboard/home');
            } else {
                $notification = ['message' => 'Your account is Inactive', 'type' => 'notif-warning'];
            }
           
            Session::flash('notification', $notification); 
            return redirect('/dashboard/login');
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
