<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Personal_info;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserFormRequest;
use Spatie\Activitylog\Models\Activity;

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

    public function getLogsView($logId) {
    	$log = Activity::where('subject_id', $logId)->first();
   	
   	dd($log->username);
    	return view('dashboard.main.logs-view')->with('log', $log);
    }
}
