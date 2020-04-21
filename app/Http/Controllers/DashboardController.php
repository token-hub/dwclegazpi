<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Personal_info;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserFormRequest;
use Spatie\Activitylog\Models\Activity;
use yajra\Datatables\Datatables;
use DB;

class DashboardController extends Controller
{ 
    public function getHome() {
        return view('dashboard.main.home');
    }

    public function getProfileView($id) {
    	$user = User::find($id);
    	return view('dashboard.profile.view')->with('user', $user);
    }

     public function anyProfileUpdateForm($id) {
    	$user = User::find($id);
    	return view('dashboard.profile.update')->with('user', $user);
    }

    public function anyProfileUpdate($id, UpdateUserFormRequest $request) {
  
	    # update user
	    $user = User::find($id);
	    $user->username = $request->username;
	    if ($request->new_password && $request->old_password) {
	    	$user->password = \Hash::make($request->new_password);
	    	Auth::login($user);
	    }
	    
	    # update personal info
	    $personal_info = Personal_info::where('user_id', $id)->first();
	    $personal_info->firstname = $request->firstname;
	    $personal_info->lastname = $request->lastname;
	    $personal_info->gender = $request->gender;
	    
	    # update department
	    $department = Departments::where('user_id', $id)->first();
	    $department->department_name = $request->department_name;

	    if ($user->isDirty() || $personal_info->isDirty() || $department->isDirty()) {
	    	 $notification = ['message' => 'Information updated!', 'type' => 'notif-success'];
	    } else {
	    	$notification = ['message' => 'Nothing to update.', 'type' => 'notif-info'];
	    }

	    $user->save();
	    $personal_info->save();
	    $department->save();
	    
    	return redirect('dashboard/profile-view/'.$id)->with('notification', $notification);
    }

    public function getLogs() {
    	return view('dashboard.main.logs');
    }

    public function getLogsData() {

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

    public function getLogsView($id, $date) { 

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
