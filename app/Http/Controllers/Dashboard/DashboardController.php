<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Services\UserService;

class DashboardController extends Controller
{ 
	protected $userService;

	public function __construct(UserService $userService) 
	{
		$this->userService = $userService;
	}

    public function index() 
    {
    	dd($this->userService->store(1));
        return view('dashboard.main.home');
    }
}
