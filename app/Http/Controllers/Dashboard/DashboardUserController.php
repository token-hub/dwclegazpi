<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services\UserService;
use App\Models\Entities\User;
use App\Models\Entities\Role;
use App\Http\Requests\AccountUpdateRequest;

class DashboardUserController extends Controller
{
	protected $userService;

	public function __construct(UserService $userService)
	{
		$this->userService = $userService;
	} 

    public function index()
    {
    	return view('dashboard.main.user.index');
    }

    public function edit(User $user)
    {
        return view('dashboard.main.user.edit')->with(['user' => $user, 'roles' => Role::all()]);
    }

    public function update(User $user, AccountUpdateRequest $request)
    {
        $result = $this->userService->updateAccount($user, $request);
        return redirect()->back()->with('notification', $result);
    }

    # this is accessed by an ajax request
    public function delete(User $user)
    {
        $this->userService->deleteAccount($user);
        return 'dashboard/users';
    }

    public function userData()
    {
    	return $this->userService->userData();
    }
}
