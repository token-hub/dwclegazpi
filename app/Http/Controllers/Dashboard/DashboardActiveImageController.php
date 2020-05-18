<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Services\ImageService;
use App\Models\Entities\Image;
use Illuminate\Http\Request;

class DashboardActiveImageController extends Controller
{
	protected $imageService;

	public function __construct(ImageService $imageService)
	{
		$this->imageService = $imageService;
	}

    public function index(Image $image)
    {	
        $this->authorize('viewAnyActive', Image::class);

    	$active = $this->imageService->activeChunk();

    	return view('dashboard.main.image.active')->with(['active' => $active, 'image' => $image]);
    }

    # This function is accessed by an ajax request
    public function update(Request $request, Image $image) 
    {
        $this->authorize('updateActive', $image);

        $result = $this->imageService->arrange($request);
    }

    # This function is accessed by an ajax request
    public function destroy(Request $request, Image $image) 
    {
         $this->authorize('deleteActive', $image);

        $result = $this->imageService->deactivate($request);
    }
}
