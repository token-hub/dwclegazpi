<?php 

namespace App\Models\Services;

use App\Models\Repositories\PermissionInterface;
use yajra\Datatables\Datatables;

class PermissionService
{
	protected $permissionInterface;

	public function __construct(PermissionInterface $permissionInterface)
	{
		$this->permissionInterface = $permissionInterface;
	}

	public function store($data)
	{
		$this->permissionInterface->storePermission($data);
		return ['type' => 'notif-success', 'message' => 'Permission added successfully!'];
	}

	public function update($permission, $data)
	{
		$this->permissionInterface->updatePermission($permission, $data);
		return ['type' => 'notif-success', 'message' => 'Permission updated successfully!'];
	}

	public function destroy($permission)
	{
		$this->permissionInterface->destroyPermission($permission);
		\Session::flash('notification', ['type' => 'notif-success', 'message' => 'Permission deleted successfully!']);
	}

	public function permissionData()
	{
		$permissions = $this->permissionInterface->getPermissions();
		
		 return Datatables::of($permissions)
            ->make(true);
	}
}