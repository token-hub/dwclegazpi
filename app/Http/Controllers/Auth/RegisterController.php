<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Personal_info;
use App\Models\Departments;
use App\Models\User_access;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
   
    public function showRegistrationForm() {
        return view('dashboardPage.registration');
    }

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    
    protected function redirectTo()
    {   
        \Session::flash('notification', ['message' => 'Registered sucessfully!', 'type' => 'success']);
        return 'dashboard/home';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // /**
    //  * Get a validator for an incoming registration request.
    //  *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
    //  */
  
     protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'max:30'],
            'lastname' => ['required', 'max:30'],
            'username' => ['required', 'unique:users', 'max:15'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'max:20'],
            'gender' => ['required'],
            'department' => ['required'],
            'system_access' => ['required'],
        ]);
    }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\User
    //  */
    
    # must return $user model
    protected function create(array $data)
    { 
        $user = new User;
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        $userid = $user->id;

        # insert new users info
        $personal_info = new Personal_info;
        $personal_info->firstname = $data['firstname'];
        $personal_info->lastname = $data['lastname'];
        $personal_info->gender = $data['gender'];
        $personal_info->user_id = $userid;
        $personal_info->save();

        # insert new users department
        $department = new Departments;
        $department->name = $data['department'];
        $department->user_id = $userid;
        $department->save();
        
        # insert new system accesses
        $system_accesss = new User_access;
        $system_accesss->user_access = $data['system_access'];
        $system_accesss->user_id = $userid;
        $system_accesss->save();

        return $user;
    }
}
