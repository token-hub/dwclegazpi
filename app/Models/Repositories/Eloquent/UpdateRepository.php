<?php 

namespace App\Models\Repositories\Eloquent;

use App\Models\Repositories\UpdateInterface;
use App\Models\Entities\Update;

class UpdateRepository implements UpdateInterface
{
	public function store($data) 
	{	
		# check if paragraph is null
		if ($data->only('paragraph')['paragraph'] == NULL) 
		{
			return \Auth::user()->updates()->create(array_merge($data->only('title', 'category', 'overview', 'start_date', 'end_date'), ['clickable' => 0] ));	
		} 

		# create the post
		$newPost = \Auth::user()->updates()->create($data->only('title', 'category', 'paragraph', 'overview', 'start_date', 'end_date'));

		# check for images attact in the post
		if(strpos($data->paragraph, '<img alt=""') !== false){

		    # get all the images attach in the post
			preg_match_all('#([^/\'"=]*?[.](?:gif|jpeg|jpg|png))\b#i',$data->paragraph, $images);

		    # save each image to database
			foreach ($images[0] as $key => $image) {
				$newPost->image()->create(['image_name' => $image]);
			}
		}

		return $newPost;
	}

	public function update($update, $data)
	{
		# check it paragraph is null
		if ($data->only('paragraph')['paragraph'] == NULL) 
		{
			return $update->update(array_merge($data->only('title', 'category', 'overview'), ['clickable' => 0] ));
		} 

		$update->update(array_merge($data->only('title', 'category', 'paragraph', 'overview')));

		# check for images attact in the post
		if(strpos($data->paragraph, '<img alt=""') !== false){

			# delete all the image related to this update
			$update->image()->delete();

		    # get all the images attach in the post
			preg_match_all('#([^/\'"=]*?[.](?:gif|jpeg|jpg|png))\b#i',$data->paragraph, $images);

		    # save each image to database
			foreach ($images[0] as $key => $image) {
				$update->image()->create(['image_name' => $image]);
			}
		}

		return $update;
	}

	public function destroy($update)
	{
		$update->image()->delete();

		$update->delete();

		return $update;
	}

	public function getAll() 
	{
		return Update::where('id', '>', '0')
							->orderBy('created_at', 'DESC')
							->get();
	}

	public function getAllAnnouncement() 
	{
		return Update::where('category', 'announcement')
						->orderBy('created_at', 'DESC')
						->get();
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
		return Update::where('category', 'news-and-events')
							->orderBy('created_at', 'DESC')
							->get();
	}

	public function getNewsAndEventsLimit($num) 
	{
		return Update::where('category', 'news-and-events')
							->orderBy('created_at', 'DESC')
							->limit($num)
							->get(['title', 'id', 'clickable']);
	}

	public function getUpdate($update)
	{
		$current = Update::find($update)
						->toArray();

		$next = Update::where('id', '>', $update)
						->orderBy('id', 'ASC')
						->first();
						
		$prev = Update::where('id', '<', $update)
						->orderBy('id', 'DESC')
						->first();

		return array_merge($current, ['next' => $next, 'prev' => $prev]);
	}

	public function getUpdateAnnouncement($update) 
	{
		$current = Update::find($update)
						->toArray();

		$next = Update::where('id', '>', $update)
						->where('category', '=', 'announcement')
						->orderBy('id', 'ASC')
						->first();
						
		$prev = Update::where('id', '<', $update)
						->where('category', '=', 'announcement')
						->orderBy('id', 'DESC')
						->first();

		return array_merge($current, ['next' => $next, 'prev' => $prev]);
	}

	public function getUpdateNewsAndEvents($update) 
	{
		$current = Update::find($update)
						->toArray();

		$next = Update::where('id', '>', $update)
						->where('category', '=', 'news-and-events')
						->orderBy('id', 'ASC')
						->first();
						
		$prev = Update::where('id', '<', $update)
						->where('category', '=', 'news-and-events')
						->orderBy('id', 'DESC')
						->first();

		return array_merge($current, ['next' => $next, 'prev' => $prev]);
	}

	public function updateLatestPostsData()
	{
		return Update::where('id', '!=', '0')
						->orderBy('created_at', 'DESC')
						->limit(3)
						->get();
	} 

	public function updateUpcomingEventsData() 
	{
		$events = Update::where('start_date', '>=', date('Y-m-d',strtotime(now())))
						->orWhere('end_date', '>=', date('Y-m-d',strtotime(now())))
						->where('category', '=', 'news-and-events')
						->orderBy('created_at', 'DESC')
						->limit(3)
						->get();
		
		return $events;
	} 
}