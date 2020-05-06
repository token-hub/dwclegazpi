<?php 

namespace App\Models\Repositories;

interface ImageInterface
{
	public function getActiveImages();

	public function getactiveImagesChunk();
	
	public function getInactiveImagesChunk();

	public function getImageByNameUpdateIsActiveNumber($image_name, $is_active);

	public function getImageByNameDelete($image_name);

	public function getActiveImagesCount();

	public function setImageNumberToNull();

	public function getImagesActiveWhereNull();
}