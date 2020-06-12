<?php 

namespace App\Models\Repositories;

interface PermissionInterface
{
	public function getPermissions();

	public function store($data);

	public function update($permission, $data);

	public function destroy($permission);
}