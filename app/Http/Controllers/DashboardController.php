<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\FormValidation;
use App\Models\User;
use App\Models\Logs;
use App\Models\Images;
use App\Models\Personal_info;
use App\Models\Departments;
use App\Models\user_access;
use yajra\Datatables\Datatables;
use Illuminate\Foundation\Auth\ResetsPasswords;

class DashboardController extends Controller
{
    use ResetsPasswords;

   public function __construct()
    {
        $this->middleware('auth')->except('index');
        // $this->middleware('verified');
        $this->middleware('preventBackHistory'); 
    }

    public function getIndex() {
        return view('dashboard.login.login-page');
    }

    public function getHome() {
        return view('dashboard.main.home');
    }

    public function getRegistration() {
        return view('dashboard.main.registration');
    }

    public function getLogs() {
        $logs = Logs::all();
        return view('dashboard.main.logs')->with('logs', $logs);
    }

    public function getActiveImages() {
        $activeImages = Images::all();
        return view('dashboard.main.active-images')->with('active-images', $activeImages);
    }

    public function getInactiveImages() {
        $inactiveImages = Images::all();
        return view('dashboard.main.inactive-images')->with('inactive-images', $inactiveImages);
    }

    public function getProfileShow($id) {
        $user = User::find($id);
        return view('dashboard.profile.view')->with('user', $user);
    }

    public function getProfileEdit(request $request, $id){
        $user = User::find($id);
        return view('dashboard.profile.update')->with('user', $user);
    }

    public function getUsers(){
        return view('dashboard.main.users');
    }

    public function getUsersData(){
        $users = User::with('departments')
                        ->with('user_access');

        return Datatables::of($users)
            ->addColumn('departments.name', function (User $user) {
                return $user->departments->name;
            })
            ->addColumn('user_access.user_access', function (User $user) {
                return $user->user_access->user_access;
            })
            ->make(true);
    }

    public function getUserStatusUpdate($id, $status){
        $status = $status == 'Active' ? 0 : 1;

        $user = User::find($id);
        $user->is_active = $status;

        $user->save();

        return redirect('dashboard/users')->with('notification', ['message' => 'User status updated', 'type' => 'notif-success']);
    }


    public function anyProfileUpdate(formValidation $formValidation, $id){

        $notification = ['message' => '', 'type' => ''];

        # user update method
        $user = User::find($id);
        $user->username = $formValidation->username;
       
        # update if passwords is not empty
        if ($formValidation->old_password != null AND $formValidation->new_password != null) {
            $this->resetPassword($user, $formValidation->new_password);
        }
        
        $user->save();

        # personal_info update method
        $personal_info = Personal_info::where('user_id', $id)->first();
        $personal_info->firstname = $formValidation->firstname;
        $personal_info->lastname = $formValidation->lastname;
        $personal_info->gender = $formValidation->gender;
        $personal_info->save();

        # department update method
        $department = Departments::where('user_id', $id)->first();
        $department->name = $formValidation->department;
        $department->save();

        # check if changes has made
        if($user->wasChanged() AND ($personal_info->wasChanged() OR $department->wasChanged())) {
            $notification = ['message' => 'Updated successfully', 'type' => 'notif-success'];
        } else if($user->wasChanged())  {
            $notification = ['message' => 'Password reset successfully', 'type' => 'notif-success'];
        } else {
            $notification = ['message' => 'Nothing to update', 'type' => 'notif-info'];
        }

        return redirect('dashboard/profile-show/'.$id)->with('notification', $notification);
    }
}
