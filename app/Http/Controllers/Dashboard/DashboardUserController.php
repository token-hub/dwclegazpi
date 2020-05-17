<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
        $this->authorize('viewAny', User::class);

    	return view('dashboard.main.user.index');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('dashboard.main.user.edit')->with(['user' => $user, 'roles' => Role::all()]);
    }

    public function update(User $user, AccountUpdateRequest $request)
    {   
        $this->authorize('update', $user);

        $result = $this->userService->update($user, $request);

        return redirect()->back()->with('notification', $result);
    }

    # this is accessed by an ajax request
    public function delete(User $user)
    {
        $this->authorize('delete', $user);

        $this->userService->destroy($user);

        return 'dashboard/users';
    }

    public function userData(User $user)
    {
        $allowedAction = [];
        
        if (policy($user)->update(\Auth::user(), $user)) {
            array_push($allowedAction, 'update');
        }

        if (policy($user)->delete(\Auth::user(), $user)) {
            array_push($allowedAction, 'delete');
        }

    	return $this->userService->userData($allowedAction);
    }
}
