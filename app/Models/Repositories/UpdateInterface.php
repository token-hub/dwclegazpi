<?php 

namespace App\Models\Repositories;

interface UpdateInterface 
{
	public function store($data);

	public function getAll();

	public function getAllAnnouncement();

	public function getAnnouncementChunkTwo();
	
	public function getAllNewsAndEvents();

	public function getUpdateLatestData();
}