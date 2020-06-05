<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUpdatesRequest;
use App\Models\Services\UpdateService;

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
    	return view('dashboard.main.update.create');
   	}

    public function store(CreateUpdatesRequest $request)
    {
    	$update = $this->updateService->store($request);

		return redirect('dashboard/updates')->with('notification', $update);    	
   	}
}
