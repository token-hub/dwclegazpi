<?php
namespace App\Http\Controllers\Dashboard\Auth;

use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserFormRequest;
use App\Services\UserService;
use App\Models\Entities\User;
use App\Models\Entities\Personal_info;
use App\Models\Entities\Department;

class RegisterController extends Controller
{
  public function index() 
  {
    return view('dashboard.main.user.registration');
  }

  public function store(CreateUserFormRequest $request) 
  {
    # add user
    $user = User::create(array_merge($request->only(['username', 'email']), ['password' => \Hash::make($request->password)]));

    # add department
    Department::create(array_merge($request->only(['department_name']),['user_id' => $user->id]));
    
    # add personal info
    Personal_info::create(array_merge($request->only(['firstname', 'lastname', 'gender']),['user_id' => $user->id]));

    $notification = ['message' => 'Registered Successfully!', 'type' => 'notif-success'];

    event(new Registered($user));

    return redirect('dashboard/register')->with('notification', $notification);
  }
}
