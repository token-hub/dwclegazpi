<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserFormRequest;
use App\Models\User;
use App\Models\Personal_info;
use App\Models\Departments;
use App\Models\User_access;


class RegisterController extends Controller
{
  public function getRegistration() {
    return view('dashboard/main.registration');
  }

  public function postRegistration(CreateUserFormRequest $request) {

    # add user
    $user = User::create(array_merge($request->only(['username', 'email']), ['password' => \Hash::make($request->password)]));

    # add department
    Departments::create(array_merge($request->only(['department_name']),['user_id' => $user->id]));
    
    # add personal info
    Personal_info::create(array_merge($request->only(['firstname', 'lastname', 'gender']),['user_id' => $user->id]));

    # add user access
    User_access::create(array_merge($request->only(['user_access']),['user_id' => $user->id]));

    $notification = ['message' => 'Registered Successfully!', 'type' => 'notif-success'];

    event(new Registered($user));

    return redirect('dashboard/register')->with('notification', $notification);
  }
}
