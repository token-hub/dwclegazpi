<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entities\User;
use Spatie\Activitylog\Models\Activity;
use App\Models\Services\LogService;

class DashboardLogController extends Controller
{
    protected $logService;

    public function __construct(logService $logService)
    {
        $this->logService = $logService;
    }

    public function index() 
    {
        $this->authorize('viewAny', Activity::class);

    	return view('dashboard.main.log.index');
    }

    public function show($id, $date) 
    {   
        $this->authorize('view', new Activity);

        $log = $this->logService->show($id, $date);

        return view('dashboard.main.log.show')->with('log', $log);
    }

    public function logsData(Activity $activity)
    {   
        $allowedAction = [];

        if (policy($activity)->view(\Auth::user(), $activity)) {
            array_push($allowedAction, 'view');
        }

        return $this->logService->logsData($allowedAction);
    }
}
