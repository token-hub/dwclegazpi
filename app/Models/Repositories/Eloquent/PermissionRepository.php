<?php 

namespace App\Models\Repositories\Eloquent;

use App\Models\Repositories\PermissionInterface;
use App\Models\Entities\Permission;

class PermissionRepository implements PermissionInterface 
{
	public function getPermissions()
	{
		return Permission::where('id', '>', '0')
						->orderBy('id', 'DESC')
						->get();
	}

	public function store($data)
	{
		return Permission::create($data->only('title'));
	}

	public function update($permission, $data)
	{
		return $permission->update($data->only('title'));
	}

	public function destroy($permission)
	{
		return $permission->delete();
	} 
}