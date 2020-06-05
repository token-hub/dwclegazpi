<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Services\SlideService;
use App\Models\Entities\Slide;
use Illuminate\Http\Request;

class DashboardActiveSlideController extends Controller
{
	protected $slideService;

	public function __construct(SlideService $slideService)
	{
		$this->slideService = $slideService;
	}

    public function index()
    {	
        $this->authorize('viewAnyActive', Slide::class);

    	$active = $this->slideService->activeChunk();

    	return view('dashboard.main.slide.active')->with(['active' => $active, 'slide' => new Slide]);
    }

    # This function is accessed by an ajax request
    public function update(Request $request, Slide $slide) 
    {
        $this->authorize('updateActive', $slide);

        $result = $this->slideService->arrange($request);
    }

    # This function is accessed by an ajax request
    public function destroy(Request $request, Slide $slide) 
    {
         $this->authorize('deleteActive', $slide);

        $result = $this->slideService->deactivate($request);
    }
}
