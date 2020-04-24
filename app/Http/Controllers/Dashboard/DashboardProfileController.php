<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Requests\UpdateUserFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Entities\User;
use App\Models\Entities\Personal_info;
use App\Models\Entities\Departments;

class DashboardProfileController extends Controller
{
    public function show(User $user)
    {
    	return view('dashboard.profile.view')->with('user', $user);
    }

    public function edit(User $user) 
    {
    	return view('dashboard.profile.update')->with('user', $user);
    }

    public function update($id, UpdateUserFormRequest $request) {
  
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
	    
    	return redirect('dashboard/profile/'.$id)->with('notification', $notification);
    }
}
