<?php 

namespace App\Models\Repositories;

interface PermissionInterface
{
	public function getPermissions();

	public function storePermission($data);

	public function updatePermission($permission, $data);

	public function destroyPermission($permission);
}