<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected function redirectTo()
    {   
        \Session::flash('notification', ['message' => 'Welcome to dashboard!', 'type' => 'success']);
        return 'dashboard/home';
    }

    public function showResetForm(Request $request, $token = null)
    {   
        return view('DashboardPage.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function sendResetResponse()
    {
        return redirect('dashboard/home')->with('notification', ['message' => 'Password reset Successfully', 'type' => 'success']);
    }
    
    protected function sendResetFailedResponse()
    {
        return redirect('login')->with('notification', ['message' => 'Password reset failed', 'type' => 'failed']);
    }
}
