<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Services\LoginService;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService) 
    {
        $this->loginService = $loginService;
    }

    public function index() 
    {
        return view('dashboard.main.user.login-page');
    }

    public function store(LoginRequest $LoginRequest) 
    {
        $login = $this->loginService->login($LoginRequest);

        return redirect($login['redirectTo'])->with('notification', $login['notification']);
    }

    public function destroy() 
    {     
        $logout = $this->loginService->logout();

        return redirect('dashboard')->with('notification', $logout['notification']);
    }
}
