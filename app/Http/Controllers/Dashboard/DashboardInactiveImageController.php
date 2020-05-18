<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImageRequest;
use App\Models\Services\ImageService;
use App\Models\Entities\Image;
use Illuminate\Http\Request;

class DashboardInactiveImageController extends Controller
{
	protected $imageService;

	public function __construct(ImageService $imageService)
	{
		$this->imageService = $imageService;
	}

    public function index(Image $image)
    {
        $this->authorize('viewAnyInactive', Image::class);

        $inactive = $this->imageService->inactiveChunk();

        return view('dashboard.main.image.inactive')->with(['inactive' => $inactive, 'image' => $image]);
    }

    public function store(UploadImageRequest $request, Image $image) 
    {
    	$this->authorize('createInactive', $image);

    	$result = $this->imageService->store($request);

    	return redirect('dashboard/images-inactive')->with('notification', $result);
    }

    # This function is accessed by an ajax request
    public function destroy(Request $request, Image $image) 
    {
        $this->authorize('deleteInactive', $image);

        $result = $this->imageService->remove($request);
    }

    # This function is accessed by an ajax request
    public function update(Request $request, Image $image) 
    {
        $this->authorize('updateInactive', $image);

        $result = $this->imageService->activate($request);
    }

}
