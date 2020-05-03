<?php 

namespace App\Models\Repositories;

interface ImageInterface
{
	public function getInactiveImages();

	public function getactiveImages();

	public function getImageByNameUpdateIsActiveNumber($image_name, $is_active);

	public function getImageByNameDelete($image_name);

	public function getActiveImagesCount();

	public function setImageNumberToNull();

	public function getImagesActiveWhereNull();
}