<?php

namespace App\Http\Controllers\Dashboard\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Session;

class LoginController extends Controller
{
    public function index() {
        return view('dashboard.login.login-page');
    }

    public function store(LoginRequest $LoginRequest) {
        $redirectTo = '/dashboard/home';
        
        if (Auth::attempt($LoginRequest->only('username', 'password'), $LoginRequest->remember)) {
            $user = Auth::getLastAttempted();
                 
                # check if user is active
                if ($user->is_active == 'Active') {

                    # log
                   activity('login')
                       ->causedBy($user)
                       ->log('logged in');

                    Auth::login($user, $LoginRequest->has('remember'));
                    $notification = ['message' => 'Welcome to Dashboard!', 'type' => 'notif-success'];

                } else {

                    $redirectTo = '/dashboard';
                    $notification = ['message' => 'Your account is Inactive', 'type' => 'notif-info'];
                }

            Session::flash('notification', $notification); 
            return redirect($redirectTo);
        } 

        return redirect('/dashboard');
    }

    public function destroy() {     
        # log
        activity('logout')
           ->causedBy(Auth::user())
           ->log('logged out');

        Auth::logout();

        $notification = ['message' => 'Successfully logged out.', 'type' => 'notif-success'];
        return redirect('dashboard')->with('notification', $notification);
    }
}
