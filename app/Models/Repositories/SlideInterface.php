<?php 

namespace App\Models\Repositories;

interface SlideInterface
{
	public function getActiveSlides();

	public function getactiveSlidesChunk();
	
	public function getInactiveSlidesChunk();

	public function getSlideByNameUpdateIsActiveNumber($slide_name, $is_active);

	public function getSlideByNameDelete($slide_name);

	public function getActiveSlidesCount();

	public function setSlideNumberToNull();

	public function getSlidesActiveWhereNull();
}