<?php 

namespace App\Models\Repositories\Eloquent;
use App\Models\Repositories\RoleInterface;
use App\Models\Entities\Role;

class RoleRepository implements RoleInterface
{
	public function getRoles()
	{
		return Role::where('id', '>', '0')
						->orderBy('id', 'DESC')
						->get();
	}

	public function store($data)
	{
		$role = Role::create($data->only('title'));
		$role->permissions()->sync($data->permissions);
		return $role;
	}

	public function update($role, $data)
	{	
		$role->update($data->only('title'));
		$role->permissions()->sync($data->permissions);
		return $role; 
	}

	public function destroy($role)
	{
		return $role->delete();
	}
}