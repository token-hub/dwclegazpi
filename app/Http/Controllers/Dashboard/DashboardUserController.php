<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services\UserService;

class DashboardUserController extends Controller
{
	protected $userService;

	public function __construct(UserService $userService)
	{
		$this->userService = $userService;
	} 

    public function index()
    {
    	return view('dashboard.main.users');
    }

    public function userData()
    {
    	return $this->userService->userData();
    }
}
