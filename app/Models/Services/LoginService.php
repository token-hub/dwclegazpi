<?php 

namespace App\Models\Services;
use Illuminate\Support\Facades\Auth;

class LoginService {

	public function login($data) 
	{
		$redirectTo = '/dashboard';
		$notification = ['message' => 'Credentials not found!', 'type' => 'notif-danger'];

        $attempt = array_merge($data->only('username', 'password'), ['is_active' => 0]);

        # check if account is active
        if (Auth::attempt($attempt, $data->has('remember'))) {
            $notification = ['message' => 'Your account is Inactive', 'type' => 'notif-danger'];
        }

        # success
        if (Auth::attempt($data->only('username', 'password'), $data->has('remember'))) { 
            $redirectTo = '/dashboard/home';
            $notification = ['message' => 'Welcome to Dashboard!', 'type' => 'notif-success'];
            
            # log
            activity('login')
               ->causedBy(Auth::user())
               ->log('logged in');
        } 

        return ['redirectTo' => $redirectTo, 'notification' => $notification];
	}

	public function logout() 
	{
		# log
        activity('logout')
           ->causedBy(Auth::user())
           ->log('logged out');

        $notification = ['message' => 'Successfully logged out.', 'type' => 'notif-success'];

        Auth::logout();

        return ['notification' => $notification];
	}
}