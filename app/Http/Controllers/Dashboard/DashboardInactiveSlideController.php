<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImageRequest;
use App\Models\Services\SlideService;
use App\Models\Entities\Slide;
use Illuminate\Http\Request;

class DashboardInactiveSlideController extends Controller
{
	protected $slideService;

	public function __construct(SlideService $slideService)
	{
		$this->slideService = $slideService;
	}

    public function index()
    {
        $this->authorize('viewAnyInactive', Slide::class);

        $inactive = $this->slideService->inactiveChunk();

        return view('dashboard.main.slide.inactive')->with(['inactive' => $inactive, 'slide' => new Slide]);
    }

    public function store(UploadImageRequest $request, Slide $slide) 
    {
    	$this->authorize('createInactive', $slide);

    	$result = $this->slideService->store($request);

    	return redirect('dashboard/slides-inactive')->with('notification', $result);
    }

    # This function is accessed by an ajax request
    public function destroy(Request $request, Slide $slide) 
    {
        $this->authorize('deleteInactive', $slide);

        $result = $this->slideService->remove($request);
    }

    # This function is accessed by an ajax request
    public function update(Request $request, Slide $slide) 
    {
        $this->authorize('updateInactive', $slide);

        $result = $this->slideService->activate($request);
    }
}
