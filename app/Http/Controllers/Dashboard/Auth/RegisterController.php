<?php
namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserFormRequest;
use App\Models\Services\UserService;
use App\Models\Entities\User;

class RegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index() 
    {
        $this->authorize('create', User::class);

        return view('dashboard.main.user.registration');
    }

    public function store(CreateUserFormRequest $request) 
    {
        $this->authorize('create', User::class);

        $result = $this->userService->store($request);

        return redirect('dashboard/register')->with('notification', $result);
    }
}
