<?php 

namespace App\Models\Repositories\Eloquent;

use App\Models\Repositories\UpdateInterface;
use App\Models\Entities\Update;

class UpdateRepository implements UpdateInterface
{
	public function store($data) 
	{
		return Update::create($data->only('title', 'category', 'paragraph'));
	}
}