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

    public function edit(Update $update)
    {
        $this->authorize('update', $update);

        return view('dashboard.main.update.edit')->with('updates', $update);
    }

    public function update(CreateUpdatesRequest $request, Update $update)
    {
        $this->authorize('update', $update);

        $updates = $this->updateService->update($update, $request);

        return redirect('dashboard/updates')->with('notification', $updates); 
    }

    # this is accessed by an ajax request
    public function destroy(Update $update)
    {
        $this->authorize('delete', $update);

        $updates = $this->updateService->destroy($update);

        return 'dashboard/updates';
    }

    public function updateData(Update $Update)
    {
        $allowedAction = [];
        
        if (policy($Update)->update(\Auth::user(), $Update)) {
            array_push($allowedAction, 'update');
        }

        if (policy($Update)->delete(\Auth::user(), $Update)) {
            array_push($allowedAction, 'delete');
        }

        return $this->updateService->updateData($allowedAction);
    }
}
