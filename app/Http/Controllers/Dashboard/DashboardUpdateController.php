<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUpdatesRequest;
use App\Models\Services\UpdateService;
use App\Models\Entities\Update;

class DashboardUpdateController extends Controller
{
	public $updateService;

	public function __construct(UpdateService $updateService)
	{
		$this->updateService = $updateService;
	}

    public function index()
    {    	
    	return view('dashboard.main.update.index');
    }

    public function create()
    {
        $this->authorize('create', Update::class);

    	return view('dashboard.main.update.create');
   	}

    public function store(CreateUpdatesRequest $request)
    {
        $this->authorize('create', Update::class);

    	$update = $this->updateService->store($request);

		return redirect('dashboard/updates')->with('notification', $update);    	
   	}

    public function updateData(Update $Update)
    {
        $allowedAction = [];
        
        // if (policy($Update)->update(\Auth::user(), $Update)) {
        //     array_push($allowedAction, 'update');
        // }

        // if (policy($Update)->delete(\Auth::user(), $Update)) {
        //     array_push($allowedAction, 'delete');
        // }

        return $this->updateService->updateData($allowedAction);
    }
}
