<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entities\User;
use Spatie\Activitylog\Models\Activity;
use App\Models\Services\LogService;

class DashboardLogsController extends Controller
{
    protected $logService;

    public function __construct(logService $logService)
    {
        $this->logService = $logService;
    }

    public function index() 
    {
    	return view('dashboard.main.logs');
    }

<<<<<<< HEAD
    public function show($id, $date) 
    { 
        $log = $this->logService->show($id, $date);
=======
    public function show($id, $date) { 

        $logs = Activity::where('Activity_log.causer_id', $id)
        	->where('Activity_log.created_at', $date)
            ->leftJoin('users', 'users.id', '=', 'causer_id')
            ->get(['*', 'Activity_log.created_at'])
            ->orderBy('Activity_log.id', 'DESC');

        # get all the activity properties
        $properties = $logs->filter(function($logItem){
            return $logItem->properties != '[]';
        })->map(function($item){
            return !empty($item->properties['old']) 
            ? array('old' => $item->properties['old'], 'new' => $item->properties['attributes']) 
            : array('old' => [], 'new' => $item->properties['attributes']);
        });

        # get the causer id
        $subject_username = User::find($logs[0]['causer_id'])['username'];

        # create a single array out of the logs
        $newLog = array_merge($logs[0]->toArray(),
        	['properties' => $properties->toArray(),
             'subject_username' => $subject_username]);
>>>>>>> uploadImage

		return view('dashboard.main.logs-view')->with('log', $log);
    }
}
