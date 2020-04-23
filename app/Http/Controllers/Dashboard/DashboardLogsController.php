<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Activitylog\Models\Activity;

class DashboardLogsController extends Controller
{
    public function index() 
    {
    	return view('dashboard.main.logs');
    }

    public function store($id, $date) { 

        $logs = Activity::where('Activity_log.causer_id', $id)
        	->where('Activity_log.created_at', $date)
            ->leftJoin('users', 'users.id', '=', 'causer_id')
            ->get(['*', 'Activity_log.created_at']);


        # get all the activity properties
        $properties = $logs->map(function($item){ 
        	if (count($item->properties) != 0 ) {
		  		return array('old' => $item->properties['old'], 'new' => $item->properties['attributes']);
			}
		});

        # object to array
        $logs = $logs->toArray();

        // # get only the log data
        $log = array_shift($logs);

        $subject_username = User::find($log['causer_id'])['username'];

        $newLog = array_merge($log,
        	['properties' => $properties->toArray(), 'subject_username' => $subject_username]);

		return view('dashboard.main.logs-view')->with('log', $newLog);
    }
}
