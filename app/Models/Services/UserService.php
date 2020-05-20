<?php 

namespace App\Models\Services;

use App\Models\Repositories\UserInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Entities\User;
use App\Models\Entities\Personal_info;
use App\Models\Entities\Department;
use yajra\Datatables\Datatables;
use Illuminate\Auth\Events\Registered;

class UserService
{
	protected $userInterface;

	public function __construct(UserInterface $userInterface) 
	{
		$this->userInterface = $userInterface;
	}

	public function store($data) 
	{
	    # add user 
	    $user = User::create(array_merge($data->only(['username', 'email']), ['password' => \bcrypt($data->password)]));

	    # add department
	    $user->department()->create(array_merge($data->only(['department_name'])));
	    
	    # add personal info
	    $user->personal_info()->create(array_merge($data->only(['firstname', 'lastname', 'gender'])));

	    event(new Registered($user));

	    return ['message' => 'Registered Successfully!', 'type' => 'notif-success'];
	}

	public function update($user, $data)
	{
		$roles = $user->roles()->sync($data->roles);
		$user->is_active = $data->status;
		$user->save();
		
		# check if pivot rule_user table is updated		
		$isRolesUpdate = (!empty($roles['attached']) || !empty($roles['detached']));

		if ($user->wasChanged() || $isRolesUpdate) {

			# log (single)
			# if ($isRolesUpdate) {
			# get old roles
			# get new roles }

			$notification = ['message' => 'Account updated!', 'type' => 'notif-success'];
		} else {
			$notification = ['message' => 'Nothing to update', 'type' => 'notif-info'];
		}
		
		return $notification;
	}

	public function destroy($user)
	{
		$user->delete();
		
		\Session::flash('notification', ['type' => 'notif-success', 'message' => 'Account deleted successfully!']);
	}

	public function userData($data)
	{
		$users = User::all();

        return Datatables::of($users)
            ->addColumn('department.name', function ($user)  {
                return $user->department->department_name;
            })
            ->addColumn('roles.title', function ($user) {
                return $user->roles->pluck('title')->toArray();
            })
            ->addColumn('action', function ($user) use ($data) {
            	if(!empty($data)) {
            		$action = '';

            		if (in_array('update', $data)){
            		$action .= "<a href='/dashboard/users/". $user->id . "/edit'> <button style='width:100%;margin:2px 0;' class='btn btn-sm btn-info '> Update </button> </a>";
	            	}

	            	if (in_array('delete', $data)){
	            		$action .= "<button value='".$user->id."' style='width:100%;' class='btn btn-sm btn-danger delete_account'> Delete </button>";
	            	}

	            	return $action;
            	}
            	
            	return 'N/A';
            })
            ->make(true);
	}
}