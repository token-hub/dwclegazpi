<?php 

namespace App\Models\Services;

use App\Models\Repositories\UserInterface;
use Illuminate\Support\Facades\Auth;

class ProfileService 
{
	protected $userInterface;

	public function __construct(UserInterface $userInterface) 
	{
		$this->userInterface = $userInterface;
	}

	public function update($data)
	{
		# update user
		$user = $this->userInterface->getById($data['update_user_id']);
	    $user->username = $data['username'];

	    if ($data['new_password'] && $data['old_password']) {
	    	$user->password = \Hash::make($data['new_password']);
	    	Auth::login($user);
	    }

	    # update personal info
	    $user->personal_info->firstname = $data['firstname'];
	    $user->personal_info->lastname = $data['lastname'];
	    $user->personal_info->gender = $data['gender'];

	    # update department
	    $user->departments->department_name = $data['department_name'];

	    $user->push();

	    # check if changes happened in the database
	    if ($user->wasChanged() || $user->personal_info->wasChanged() || $user->departments->wasChanged()) {
	    	 $notification = ['message' => 'Information updated!', 'type' => 'notif-success'];
	    } else {
	    	$notification = ['message' => 'Nothing to update.', 'type' => 'notif-info'];
	    }

	    return $notification;
	}
}