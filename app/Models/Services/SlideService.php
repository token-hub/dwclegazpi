<?php 

namespace App\Models\Services;

use App\Models\Entities\Slide;
use App\Models\Repositories\SlideInterface;

class SlideService 
{
	protected $slideInterface;

	public function __construct(SlideInterface $slideInterface)
	{
		$this->SlideInterface = $slideInterface;
	}

	public function active()
	{
		return $this->SlideInterface->getActiveSlides();
	}

	public function activeChunk()
	{
		return $this->SlideInterface->getActiveSlidesChunk();
	}

	public function inactiveChunk()
	{
		return $this->SlideInterface->getInactiveSlidesChunk();
	}

	public function activate($slides)
	{

		foreach ($slides->slides as $slide) 
		{	
			# update the image to active
			$this->SlideInterface->getSlideByNameUpdateIsActiveNumber($slide);

	    	# move the image to active images folder
	    	\Storage::move('public/img/slider/inactive/'.$slide, 'public/img/slider/active/'.$slide);
        }
	     
	   # log
       activity('Slider image/s')
           ->causedBy(\Auth::user())
           ->log('activated');

        \Session::flash('notification', ['message' => 'Image/s successfully activated!', 'type' => 'notif-success']);
	}

	public function remove($slides) 
	{
		foreach ($slides->slides as $slide) 
		{	
			# delete slide
			$this->SlideInterface->getSlideByNameDelete($slide);

	    	# delete slide file
	    	\Storage::delete('public/img/slider/inactive/'.$slide);
        }

	   # log
       activity('Slider image/s')
           ->causedBy(\Auth::user())
           ->log('removed');

		\Session::flash('notification', ['message' => 'Image/s successfully removed!', 'type' => 'notif-success']);
	}

	public function arrange($slides)
	{	
		# update every slide number to null then 
		$this->SlideInterface->setSlideNumberToNull();

		foreach ($slides->slides as $slide) 
		{	
			# set the slide number of the selected active slides.
			$this->SlideInterface->getSlideByNameUpdateIsActiveNumber($slide);
        }

        foreach ($this->SlideInterface->getSlidesActiveWhereNull() as $slide) 
        {	
        	# set the slide number of the not selected active slides. 
        	$this->SlideInterface->getSlideByNameUpdateIsActiveNumber($slide->image->image_name);
        }

        # log
       activity('Slider image/s')
           ->causedBy(\Auth::user())
           ->log('arranged');

        \Session::flash('notification', ['message' => 'Image/s successfully arranged.', 'type' => 'notif-success']);
	}

	public function deactivate($slides)
	{
		foreach ($slides->slides as $slide) 
		{
			# set the slide number of the not selected active images. 
        	$this->SlideInterface->getSlideByNameUpdateIsActiveNumber($slide, 0, null);

			# move the slide to inactive images folder
	    	\Storage::move('public/img/slider/active/'.$slide, 'public/img/slider/inactive/'.$slide);
		}

		# log
       activity('Slider image/s')
           ->causedBy(\Auth::user())
           ->log('deactivated');

		\Session::flash('notification', ['message' => 'Image/s successfully deactivated', 'type' => 'notif-success']);
	}

	public function store($data)
	{
		foreach ($data->image_name as $value) 
		{
			$this->SlideInterface->storeImage($value);
	    	
	    	# move the slide to storage
	    	$value->storeAs('public/img/slider/inactive', $value->getClientOriginalName());
        }

       # log
       activity('Slider image/s')
           ->causedBy(\Auth::user())
           ->log('uploaded');

		return ['message' => 'Image/s successfully uploaded!', 'type' => 'notif-success'];
	}
}