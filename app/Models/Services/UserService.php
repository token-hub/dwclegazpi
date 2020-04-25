<?php 

namespace App\Models\Services;

use App\Models\Repositories\UserInterface;
use Illuminate\Support\Facades\Auth;

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

	public function update($data)
	{
		$user = $this->userInterface->getById($data->update_user_id);
		
		$user->username = $data->username;

		# check if user has entered a new and old password
	    if ($data->new_password && $data->old_password) {
	    	$user->password = \Hash::make($data->new_password);
	    	Auth::login($user);
	    }

	    $isDirty = $user->isDirty();

	    $user->save();
	    
		return $isDirty;
	}
}