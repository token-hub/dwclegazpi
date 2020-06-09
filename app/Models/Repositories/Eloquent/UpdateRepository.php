<?php 

namespace App\Models\Repositories\Eloquent;

use App\Models\Repositories\UpdateInterface;
use App\Models\Entities\Update;

class UpdateRepository implements UpdateInterface
{
	public function store($data) 
	{
		if ($data->only('paragraph')['paragraph'] == NULL) 
		{
			return \Auth::user()->updates()->create(array_merge($data->only('title', 'category', 'overview'), ['clickable' => 0] ));	
		} 

		return \Auth::user()->updates()->create($data->only('title', 'category', 'paragraph', 'overview'));
	}

	public function getAll() 
	{
		return Update::all();
	}

	public function getAllAnnouncement() 
	{
		return Update::where('category', 'announcement')->get();
	}

	public function getAnnouncementChunkTwo()
	{
		$announcement = Update::where('category', 'announcement')
							->orderBy('created_at', 'DESC')
							->limit(4)
							->get();
		return array_chunk($announcement->toArray(), 2);
	}

	public function getAllNewsAndEvents() 
	{
		return Update::where('category', 'news-and-events')->get();
	}

	public function getUpdateLatestData()
	{
		return Update::where('id', '!=', '0')
						->orderBy('created_at', 'DESC')
						->limit(3)
						->get();
	}  
}