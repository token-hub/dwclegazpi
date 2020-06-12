<?php 

namespace App\Models\Repositories;

interface UserInterface 
{
	public function getById($id);

	public function store($data);

	public function update($user, $data);

	public function destroy($user);
}