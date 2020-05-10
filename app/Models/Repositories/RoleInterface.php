<?php 

namespace App\Models\Repositories;

interface RoleInterface
{
	public function getRoles();

	public function storeRole($data);

	public function updateRole($role, $data);

	public function destroyRole($role);
}