<?php 

namespace App\Models\Repositories\Eloquent;

use App\Models\Repositories\ImageInterface;
use App\Models\Entities\Images;

class ImageRepository implements ImageInterface
{
	protected $images;

	public function __construct(Images $images)
	{
		$this->images = $images;
	}

	public function getActiveImages() 
	{
		$active = $this->images->where('is_active' , 1)
					->orderBy('number', 'ASC')
					->get();

		return array_chunk($active->toArray(), 3);
	}

	public function getInactiveImages()
	{
		$inactive = $this->images->where('is_active' , 0)
					->orderBy('created_at', 'DESC')
					->get();

		return array_chunk($inactive->toArray(), 3);
	}

	public function getImageByNameUpdateIsActiveNumber($image_name, $is_active = 1, $number = null) 
	{
		return $this->images->where('image_name', $image_name)
							->update([
										'is_active' => $is_active,
									 	'number' => $number == null ? $this->getActiveImagesCount() + 1 : $number,
									]);
	}

	public function getImageByNameDelete($image_name) 
	{
		return $this->images->where('image_name', $image_name)
							->delete();
	}

	public function getActiveImagesCount()
	{
		return $this->images->where('is_active', '=', '1')
							->max('number');
	}

	public function setImageNumberToNull()
	{
		return $this->images->where('is_active', '=', '1')
							->update(['number' => null]);
	}

	public function storeImage($image)
	{
		return $this->images->create([
		    		'image_name' => $image->getClientOriginalName(),
		    	]);
	}

	public function getImagesActiveWhereNull()
	{
		return $this->images->where('is_active', '=', '1')
				->whereNull('number')
				->get();	
	}
}