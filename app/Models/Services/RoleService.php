<?php 

namespace App\Models\Services;

use App\Models\Repositories\RoleInterface;
use yajra\Datatables\Datatables;

class RoleService 
{
	protected $roleInterface;

	public function __construct(RoleInterface $roleInterface)
	{
		$this->roleInterface = $roleInterface;
	}

	public function index() 
	{
		return $this->roleInterface->getRoles();
	}

	public function roleData()
	{
		$roles = $this->roleInterface->getRoles();

		return Datatables::of($roles)
            ->make(true);
	}

	public function store($data)
	{
		$this->roleInterface->storeRole($data);
		return ['type' => 'notif-success', 'message' => 'Role added successfully!'];
	}

	public function update($role, $data)
	{
		$this->roleInterface->updateRole($role, $data);
		return ['type' => 'notif-success', 'message' => 'Role updated successfully!'];
	}

	public function destroy($role)
	{
		$this->roleInterface->destroyRole($role);
		\Session::flash('notification', ['type' => 'notif-success', 'message' => 'Role deleted successfully!']);
	}
}