<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImageRequest;
use App\Models\Services\ImageService;

class DashboardImageUploadController extends Controller
{
	protected $imageService;

	public function __construct(ImageService $imageService)
	{
		$this->imageService = $imageService;
	}

    public function store(UploadImageRequest $request) 
    {
    	$notification = $this->imageService->store($request);

    	return redirect('dashboard/images-inactive')->with('notification', $notification);
    }
}
