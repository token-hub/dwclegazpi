<?php 

namespace App\Models\Repositories;

interface UpdateInterface 
{
	public function store($data);

	public function update($update, $data);

	public function destroy($update);

	public function getAll();

	public function getAllAnnouncement();

	public function getAnnouncementChunkTwo();
	
	public function getAllNewsAndEvents();

	public function getUpdateOrigin($update);

	public function getNewsAndEventsLimit($num);

	public function updateLatestPostsData();

	public function updateUpcomingEventsData();
}