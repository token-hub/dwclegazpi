<?php 

namespace App\Models\Repositories\Eloquent;

use App\Models\Repositories\ImageInterface;
use App\Models\Entities\Image;

class ImageRepository implements ImageInterface
{
	protected $image;

	public function __construct(Image $image)
	{
		$this->image = $image;
	}

	public function getActiveImages() 
	{
		$active = $this->image->where('is_active' , 1)
					->orderBy('number', 'ASC')
					->get();

		return $active;
	}

	public function getActiveImagesChunk() 
	{
		$active = $this->image->where('is_active' , 1)
					->orderBy('number', 'ASC')
					->get();

		return array_chunk($active->toArray(), 3);
	}

	public function getInactiveImagesChunk()
	{
		$inactive = $this->image->where('is_active' , 0)
					->orderBy('created_at', 'DESC')
					->get();

		return array_chunk($inactive->toArray(), 3);
	}

	public function getImageByNameUpdateIsActiveNumber($image_name, $is_active = 1, $number = 0) 
	{
		return $this->image->where('image_name', $image_name)
							->update([
										'is_active' => $is_active,
									 	'number' => $number === 0 ? $this->getActiveImagesCount() + 1 : $number,
									]);
	}

	public function getImageByNameDelete($image_name) 
	{
		return $this->image->where('image_name', $image_name)
							->delete();
	}

	public function getActiveImagesCount()
	{
		return $this->image->where('is_active', '=', '1')
							->max('number');
	}

	public function setImageNumberToNull()
	{
		return $this->image->where('is_active', '=', '1')
							->update(['number' => null]);
	}

	public function storeImage($image)
	{
		return $this->image->create([
		    		'image_name' => $image->getClientOriginalName(),
		    	]);
	}

	public function getImagesActiveWhereNull()
	{
		return $this->image->where('is_active', '=', '1')
				->whereNull('number')
				->get();	
	}
}