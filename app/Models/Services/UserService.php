<?php 

namespace App\Models\Services;

use App\Models\Repositories\UserInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Entities\User;
use yajra\Datatables\Datatables;

class UserService
{
	protected $userInterface;

	public function __construct(UserInterface $userInterface) 
	{
		$this->userInterface = $userInterface;
	}

	public function store($id) 
	{
	    return $this->userInterface->getById($id);
	}

	// public function update($data)
	// {
	// 	$user = $this->userInterface->getById($data->update_user_id);
		
	// 	$user->username = $data->username;

	// 	# check if user has entered a new and old password
	//     if ($data->new_password && $data->old_password) {
	//     	$user->password = \Hash::make($data->new_password);
	//     	Auth::login($user);
	//     }

	//     $isDirty = $user->isDirty();

	//     $user->save();
	    
	// 	return $isDirty;
	// }

	public function updateAccount($user, $data)
	{
		$roles = $user->roles()->sync($data->roles);
		$user->is_active = $data->status;
		$user->save();
		
		// check if pivot rule_user table is updated		
		$isRolesUpdate = (!empty($roles['attached']) || !empty($roles['detached']));

		if ($user->wasChanged() || $isRolesUpdate) {
			$notification = ['message' => 'Account updated!', 'type' => 'notif-success'];
		} else {
			$notification = ['message' => 'Nothing to update', 'type' => 'notif-info'];
		}
		
		return $notification;
	}

	public function deleteAccount($user)
	{
		$user->delete();
		\Session::flash('notification', ['type' => 'notif-success', 'message' => 'Account deleted successfully!']);
	}

	public function userData()
	{
		$users = User::all();

        return Datatables::of($users)
            ->addColumn('department.name', function (User $user) {
                return $user->department->department_name;
            })
            ->addColumn('roles.title', function (User $user) {
                return $user->roles->pluck('title')->toArray();
            })
            ->make(true);
	}
}