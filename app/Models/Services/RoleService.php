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

	public function roleData($data)
	{
		$roles = $this->roleInterface->getRoles();

		return Datatables::of($roles)
            ->addColumn('action', function($role) use ($data){

            	if(!empty($data)) {
            		$action = '';

            		if (in_array('update', $data)){
            		$action .= "<a href='/dashboard/roles/". $role->id . "/edit'> <button style='width:100%;margin:2px 0;' class='btn btn-sm btn-info '> Update </button> </a>";
	            	}

	            	if (in_array('delete', $data)){
	            		$action .= "<button value='".$role->id."' style='width:100%;' class='btn btn-sm btn-danger delete_role'> Delete </button>";
	            	}

	            	return $action;
            	}
            	
            	return 'N/A';
            })
            ->make(true);
	}
}