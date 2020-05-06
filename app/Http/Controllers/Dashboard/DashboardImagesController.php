<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
<<<<<<< HEAD

class DashboardImagesController extends Controller
{
    public function active()
    {
    	return view('dashboard.main.active-images');
=======
use App\Models\Services\ImageService;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Http\Request;

class DashboardImagesController extends Controller
{
	protected $imageService;

	public function __construct(ImageService $imageService)
	{
		$this->imageService = $imageService;
	}

    public function active()
    {	
    	$active = $this->imageService->activeChunk();
    	return view('dashboard.main.active-images')->with('active', $active);
>>>>>>> uploadImage
    }

    public function inactive()
    {
<<<<<<< HEAD
    	return view('dashboard.main.inactive-images');
=======
    	$inactive = $this->imageService->inactiveChunk();
    	return view('dashboard.main.inactive-images')->with('inactive', $inactive);
    }

    # This function is accessed by an ajax request
    public function removeOrActivate(Request $request)
    {	
		$this->imageService->removeOrActivate($request);
    }

    # This function is accessed by an ajax request
    public function arrangeOrDeactivate(Request $request)
    {
    	$this->imageService->arrangeOrDeactivate($request);
>>>>>>> uploadImage
    }
}
