<?php 

namespace App\Models\Repositories\Eloquent;

use App\Models\Repositories\SlideInterface;
use App\Models\Entities\Slide;
use App\Models\Entities\Image;

class SlideRepository implements SlideInterface
{
	protected $slide;

	public function __construct(Slide $slide)
	{
		$this->slide = $slide;
	}

	public function getActiveSlides() 
	{
		$slides = $this->slide->where('is_active' , 1)
					->orderBy('number', 'ASC')
					->get();

		$active = $slides->map(function($slide){
			return $slide->image->image_name;
		});

		return $active;
	}

	public function getActiveSlidesChunk() 
	{
		$slides = $this->slide->where('is_active' , 1)
					->orderBy('number', 'ASC')
					->get();

		$active = $slides->map(function($slide){
			return $slide->image->image_name;
		});

		return array_chunk($active->toArray(), 3);
	}

	public function getInactiveSlidesChunk()
	{
		$slides = $this->slide->where('is_active' , 0)
					->orderBy('created_at', 'DESC')
					->get();

		$inactive = $slides->map(function($slide){
			return $slide->image->image_name;
		});

		return array_chunk($inactive->toArray(), 3);
	}

	public function getSlideByNameUpdateIsActiveNumber($slide_name, $is_active = 1, $number = 0) 
	{
		$image_id = Image::where('image_name', $slide_name)->first()->id;

		return $this->slide->find($image_id)
							->update([
										'is_active' => $is_active,
									 	'number' => $number === 0 ? $this->getActiveSlidesCount() + 1 : $number,
									]);
	}

	public function getSlideByNameDelete($slide_name) 
	{
		$image_id = Image::where('image_name', $slide_name)->first()->id;

		return $this->slide->find($image_id)
							->delete();
	}

	public function getActiveSlidesCount()
	{
		return $this->slide->where('is_active', '=', '1')
							->max('number');
	}

	public function setSlideNumberToNull()
	{
		return $this->slide->where('is_active', '=', '1')
							->update(['number' => null]);
	}

	public function storeImage($slide)
	{
		$newSlide = $this->slide->create([
		    		'is_active' => 0,
		    	]);

		$newSlide->image()->create([
		    		'image_name' => $slide->getClientOriginalName(),
		    	]);

		return $newSlide;
	}

	public function getSlidesActiveWhereNull()
	{
		return $this->slide->where('is_active', '=', '1')
				->whereNull('number')
				->get();	
	}
}