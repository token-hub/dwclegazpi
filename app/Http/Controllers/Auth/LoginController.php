<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm() {
        return view('dashboardPage.login.loginPage');
    }

    protected function credentials(Request $request)
    {   
        $input = $request->only($this->username(), 'password');
        $input['is_active'] = 1; # check database if user is active
        return $input;
    }

    public function username()
    {
        return 'username';
    }

    protected function redirectTo()
    {   
        \Session::flash('notification', ['message' => 'Welcome to dashboard!', 'type' => 'success']);
        return 'dashboard/home';
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('notification', ['message' => 'logout successfully!', 'type' => 'success']);
    }

    protected function sendFailedLoginResponse(Request $request)
    {   
        $notification = ['message' => 'Credentials not found', 'type' => 'failed'];

        $user = User::where("username", "=", $request->password)->first();

        # check username , password and if user is active
        if ($user && \Hash::check($request->password, $user->password) && $user->is_active != 1) {
            $notification = ['message' => 'Your account is Inactive', 'type' => 'failed'];  # user is not active here...
        }

        return redirect('login')->with('notification', $notification);
    }
}
