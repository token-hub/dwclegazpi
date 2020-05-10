<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services\RoleService;
use App\Http\Requests\RoleRequest;
use App\Models\Entities\Role;
use App\Models\Entities\Permission;

class DashboardRoleController extends Controller
{
	protected $roleService;

	public function __construct(RoleService $roleService)
	{
		$this->roleService = $roleService;
	}

    public function index()
    {
    	return view('dashboard.main.role.index');
    }

    public function create()
    {
    	return view('dashboard.main.role.create')->with('permissions' , Permission::all());
    }

    public function edit(Role $role)
    {
        return view('dashboard.main.role.edit')->with(['role' => $role, 'permissions' => Permission::all()]);
    }

    public function store(RoleRequest $request)
    {   
        $result = $this->roleService->store($request);
        return redirect('dashboard/roles')->with('notification', $result);
    }

    public function update(Role $role, RoleRequest $request)
    {
        $result = $this->roleService->update($role, $request);
        return redirect('dashboard/roles')->with('notification', $result);
    }

    # this is accessed by an ajax request
    public function destroy(Role $role)
    {
        $result = $this->roleService->destroy($role);
        return 'dashboard/roles';
    }

    public function roleData()
    {
        return $this->roleService->roleData();
    }
}
