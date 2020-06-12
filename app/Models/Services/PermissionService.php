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
		$this->permissionInterface->store($data);

		return ['type' => 'notif-success', 'message' => 'Permission added successfully!'];
	}

	public function update($permission, $data)
	{
		$this->permissionInterface->update($permission, $data);

		return ['type' => 'notif-success', 'message' => 'Permission updated successfully!'];
	}

	public function destroy($permission)
	{
		$this->permissionInterface->destroy($permission);

		\Session::flash('notification', ['type' => 'notif-success', 'message' => 'Permission deleted successfully!']);
	}

	public function permissionData($data)
	{
		$permissions = $this->permissionInterface->getPermissions();
		
		 return Datatables::of($permissions)
            ->addColumn('action', function($permission) use ($data) {
            	if(!empty($data)) {
            		$action = '';

            		if (in_array('update', $data)){
            		$action .= "<a href='/dashboard/permissions/". $permission->id . "/edit'> <button style='width:100%;margin:2px 0;' class='btn btn-sm btn-info '> Update </button> </a>";
	            	}

	            	if (in_array('delete', $data)){
	            		$action .= "<button value='".$permission->id."' style='width:100%;' class='btn btn-sm btn-danger delete_permission'> Delete </button>";
	            	}

	            	return $action;
            	}

            	return 'N/A';
            })
            ->make(true);
	}
}