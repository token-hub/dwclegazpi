<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Services\ImageService;
use Illuminate\Http\Request;

class DashboardImageController extends Controller
{
	protected $imageService;

	public function __construct(ImageService $imageService)
	{
		$this->imageService = $imageService;
	}

    public function active()
    {	
    	$active = $this->imageService->activeChunk();
    	return view('dashboard.main.image.active')->with('active', $active);
    }

    public function inactive()
    {
    	$inactive = $this->imageService->inactiveChunk();
    	return view('dashboard.main.image.inactive')->with('inactive', $inactive);
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
