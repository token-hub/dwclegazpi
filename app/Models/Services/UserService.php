<?php 

namespace App\Models\Services;

use App\Models\Repositories\UserInterface;

class UserService
{
	protected $userInterface;

	public function __construct(UserInterface $userInterface) {
		$this->userInterface = $userInterface;
	}

	public function store($data) {
	    return $this->userInterface->getById(1);
	}
}