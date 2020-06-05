<?php 

namespace App\Models\Services;

use App\Models\Repositories\UpdateInterface;

class UpdateService  
{
	public $updateInterface;

	public function __construct(UpdateInterface $updateInterface)
	{
		$this->updateInterface = $updateInterface;
	}

	public function store($data)
	{
		$this->updateInterface->store($data);

		return ['type' => 'notif-success', 'message' => 'New update added!'];
	}
}