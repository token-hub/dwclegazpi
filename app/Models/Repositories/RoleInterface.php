<?php 

namespace App\Models\Repositories;

interface RoleInterface
{
	public function getRoles();

	public function store($data);

	public function update($role, $data);

	public function destroy($role);
}