<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Services\LogService;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
=======
use Spatie\Activitylog\Models\Activity;
use yajra\Datatables\Datatables;
use App\Models\Entities\user;
>>>>>>> uploadImage

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
