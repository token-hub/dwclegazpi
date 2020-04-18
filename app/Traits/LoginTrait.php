<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Traits\LogTrait;

trait LoginTrait
{
	use LogTrait;

    public function getLogin() {
        return view('dashboard.login.login-page');
    }

    public function postLogin(LoginRequest $LoginRequest) {

        if (Auth::attempt($LoginRequest->only('username', 'password'), $LoginRequest->remember)) {
          	$this->log();
            return redirect('/dashboard/home');
        } 

        return redirect('/dashboard/login');
    }
}