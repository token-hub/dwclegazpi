<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
    	$active = $this->imageService->active();
    	return view('dashboard.main.active-images')->with('active', $active);
    }

    public function inactive()
    {
    	$inactive = $this->imageService->inactive();
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
    }
}
