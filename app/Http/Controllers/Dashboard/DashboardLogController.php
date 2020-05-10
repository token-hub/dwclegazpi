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
    	return view('dashboard.main.log.view');
    }

    public function show($id, $date) 
    { 
        $log = $this->logService->show($id, $date);
        return view('dashboard.main.log.specific-view')->with('log', $log);
    }

    public function logsData()
    {
        return $this->logService->logsData();
    }
}
