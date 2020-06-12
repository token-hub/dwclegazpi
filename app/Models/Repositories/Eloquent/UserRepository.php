<?php 

namespace App\Models\Repositories\Eloquent;

use App\Models\Entities\User;
use App\Models\Repositories\UserInterface;

class UserRepository implements UserInterface
{

	protected $user;

	public function __construct(User $user) 
	{
		$this->user = $user;
	}

	public function getById($id) 
	{
		return $this->user->where('id', $id)->first();
	}

	public function store($data)
	{	
		# add user 
	    $user = User::create(array_merge($data->only(['username', 'email']), ['password' => \bcrypt($data->password)]));

	    # add department
	    $user->department()->create(array_merge($data->only(['department_name'])));
	    
	    # add personal info
	    $user->personal_info()->create(array_merge($data->only(['firstname', 'lastname', 'gender'])));

		return $user;
	}

	public function update($user, $data)
	{
		$roles = $user->roles()->sync($data->roles);
		$user->is_active = $data->status;
		$user->save();

		# check if pivot rule_user table is updated		
		$isRolesUpdate = (!empty($roles['attached']) || !empty($roles['detached']));

		return ['user' => $user, 'isRolesUpdate' => $isRolesUpdate];
	}

	public function destroy($user)
	{
		return $user->delete();
	}
}