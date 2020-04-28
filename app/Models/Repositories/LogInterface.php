<?php 

namespace App\Models\Repositories;

interface LogInterface
{
	public function getWhereCauserIdNotNull();

	public function getByCauserIdAndDate($id, $date);
}