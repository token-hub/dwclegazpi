<?php 

namespace App\Models\Services;
use Illuminate\Support\Facades\Auth;

class LoginService {

	public function login($data) 
	{
		$redirectTo = '/dashboard';
		$notification = ['message' => '', 'type' => ''];

        if (Auth::attempt($data->only('username', 'password'), $data->remember)) {
            $user = Auth::getLastAttempted();
                 
            # check if user is active
            if ($user->is_active == 'Active') {

                # log
               activity('login')
                   ->causedBy($user)
                   ->log('logged in');

                Auth::login($user, $data->has('remember'));
                $notification = ['message' => 'Welcome to Dashboard!', 'type' => 'notif-success'];
                $redirectTo = '/dashboard/home';
            } else {

                $notification = ['message' => 'Your account is Inactive', 'type' => 'notif-info'];
            }
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