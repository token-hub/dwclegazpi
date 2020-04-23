<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Resources\LogsResources;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use yajra\Datatables\Datatables;
use App\Models\user;

class DashboardLogsDataController extends Controller
{
    public function index() {
		 $logs = Activity::whereNotNull('causer_id')
        ->groupBy('created_at')
        ->orderBy('id')
        ->get();

	    return Datatables::Of($logs)
	    ->editColumn('description', function ($logs) {
	        return  strpos($logs->log_name, 'Log') == true 
	            ? 'A user '.$logs->description 
	            : 'A '.$logs->log_name.' '.$logs->description;
	     })
	    ->addColumn('timeAndDate', function ($logs) {
	          return date("F d, Y | h:i A", strtotime($logs->created_at));
	     })
	     ->addColumn('username', function ($logs) {
	          return  ucfirst(User::find($logs->causer_id)->username);
	     })
	    ->make(true);
    }
}
