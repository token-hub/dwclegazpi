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
}