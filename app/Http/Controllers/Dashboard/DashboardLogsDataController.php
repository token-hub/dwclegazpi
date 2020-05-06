<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Services\LogService;
use App\Http\Controllers\Controller;

class DashboardLogsDataController extends Controller
{
	protected $logService;

    public function __construct(LogService $logService) 
    {
		$this->logService = $logService;
    }

    public function index()
    {
    	return $this->logService->index();
    }
}
