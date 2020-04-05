<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Personal_info;
use App\Models\Departments;
use App\Models\user_access;
use App\Rules\old_password_checker;
use yajra\Datatables\Datatables;

class DashboardController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth')->except('index');
        // $this->middleware('verified');
        $this->middleware('preventBackHistory'); 
    }

    public function index() {
        return view('DashboardPage.login.loginPage');
    }

    public function getHome() {
        return view('DashboardPage.main.home');
    }

    public function getRegistration() {
        return view('DashboardPage.registration');
    }

    public function getProfileShow($id) {
        $user = User::find($id);
        return view('DashboardPage.Profile.profile')->with('user', $user);
    }

    public function getProfileEdit(request $request, $id){
        $user = User::find($id);
        return view('DashboardPage.Profile.update')->with('user', $user);
    }

    public function getUsers(){
        return view('DashboardPage.users');
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

        return redirect('dashboard/users')->with('notification', ['message' => 'User status updated', 'type' => 'success']);
    }


    public function getProfileUpdate(request $request, $id){
        # validate fields
        $this->validate($request, [
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'username' => 'required|max:15|unique:users,username,'.$id.',id',
            'old_password' => ['nullable', 'max:20', 'min:8', new old_password_checker],
            'new_password' => 'nullable|max:20|min:8',
            'gender' => 'required',
            'department' => 'required',
        ]);

        $notification = ['message' => '', 'type' => ''];

        # user update method
        $user = User::find($id);
        $user->username = $request->username;
       
        # update if passwords is not empty
        if ($request->old_password != null AND $request->new_password != null) {
            $user->password = \Hash::make($request->new_password);
        }
        
        $user->save();

        # personal_info update method
        $personal_info = Personal_info::where('user_id', $id)->first();
        $personal_info->firstname = $request->firstname;
        $personal_info->lastname = $request->lastname;
        $personal_info->gender = $request->gender;
        $personal_info->save();

        # department update method
        $department = Departments::where('user_id', $id)->first();
        $department->name = $request->department;
        $department->save();

        # check if changes has made
        if($personal_info->wasChanged() OR $department->wasChanged() OR $user->wasChanged()) {
            $notification = ['message' => 'Updated Successfully', 'type' => 'success'];
        } else {
            $notification = ['message' => 'Nothing to update', 'type' => 'information'];
        }

        return redirect('dashboard/profile-show/'.$id)->with('notification', $notification);
    }
}
