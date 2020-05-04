<?php 

namespace App\Models\Services;

use App\Models\Entities\Images;
use App\Models\Repositories\ImageInterface;

class ImageService 
{
	protected $imageInterface;

	public function __construct(ImageInterface $imageInterface)
	{
		$this->imageInterface = $imageInterface;
	}

	public function active()
	{
		return $this->imageInterface->getActiveImages();
	}

	public function activeChunk()
	{
		return $this->imageInterface->getActiveImagesChunk();
	}

	public function inactiveChunk()
	{
		return $this->imageInterface->getInactiveImagesChunk();
	}

	public function removeOrActivate($images)
	{
		if ($images->imgs_type == 'activate') {
			$result = $this->activate($images);
		} else {
			$result = $this->remove($images);
		}
		\Session::flash('notification', $result);
	}

	public function activate($images)
	{
		foreach ($images->images as $image) 
		{	
			# update the image to active
			$this->imageInterface->getImageByNameUpdateIsActiveNumber($image, 1);

	    	# move the image to active images folder
	    	\Storage::move('public/img/slider/inactive/'.$image, 'public/img/slider/active/'.$image);
        }
	     
	   # log
       activity('Slider image/s')
           ->causedBy(\Auth::user())
           ->log('activated');

	    return ['message' => 'Image/s successfully activated!', 'type' => 'notif-success'];
	}

	public function remove($images) 
	{
		foreach ($images->images as $image) 
			{	
				# delete image
				$this->imageInterface->getImageByNameDelete($image);

		    	# delete image file
		    	\Storage::delete('public/img/slider/inactive/'.$image);
	        }

	   # log
       activity('Slider image/s')
           ->causedBy(\Auth::user())
           ->log('removed');

		return ['message' => 'Image/s successfully removed.', 'type' => 'notif-success'];
	}

	public function arrangeOrDeactivate($images) 
	{
		if ($images->imgs_type == 'arrange') {
			$result = $this->arrange($images);
		} else {
			$result = $this->deactivate($images);
		}

		\Session::flash('notification', $result);
	}

	public function arrange($images)
	{	
		# update every image number to null then 
		$this->imageInterface->setImageNumberToNull();

		foreach ($images->images as $image) 
		{	
			# set the image number of the selected active images.
			$this->imageInterface->getImageByNameUpdateIsActiveNumber($image, 1);
        }

        foreach ($this->imageInterface->getImagesActiveWhereNull($images) as $image) 
        {	
        	# set the image number of the not selected active images. 
        	$this->imageInterface->getImageByNameUpdateIsActiveNumber($image->image_name, 1);
        }

        # log
       activity('Slider image/s')
           ->causedBy(\Auth::user())
           ->log('arranged');

        return ['message' => 'Image/s successfully arranged.', 'type' => 'notif-success'];
	}

	public function deactivate($images)
	{
		foreach ($images->images as $image) 
		{
			# set the image number of the not selected active images. 
        	$this->imageInterface->getImageByNameUpdateIsActiveNumber($image, 0, null);

			# move the image to inactive images folder
	    	\Storage::move('public/img/slider/active/'.$image, 'public/img/slider/inactive/'.$image);
		}

		# log
       activity('Slider image/s')
           ->causedBy(\Auth::user())
           ->log('deactivated');

		return ['message' => 'Image/s successfully deactivated.', 'type' => 'notif-success'];
	}

	public function store($data)
	{
		foreach ($data->image_name as $value) 
		{
			$this->imageInterface->storeImage($value);
	    	
	    	# move the image to storage
	    	$value->storeAs('public/img/slider/inactive', $value->getClientOriginalName());
        }

       # log
       activity('Slider image/s')
           ->causedBy(\Auth::user())
           ->log('uploaded');

		return ['message' => 'Image/s successfully uploaded!', 'type' => 'notif-success'];
	}
}