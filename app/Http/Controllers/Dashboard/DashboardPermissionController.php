<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services\PermissionService;
use App\Http\Requests\PermissionRequest;
use App\Models\Entities\Permission;

class DashboardPermissionController extends Controller
{
	protected $permissionService;

	public function __construct(PermissionService $permissionService)
	{
		$this->permissionService = $permissionService;
	}

    public function index()
    {
    	return view('dashboard.main.permission.index');
    }

    public function create()
    {
    	return view('dashboard.main.permission.create');
    }

    public function store(PermissionRequest $request)
    {
    	$result = $this->permissionService->store($request);
    	return redirect('dashboard/permissions');
    }

    public function edit(Permission $permission)
    {
    	return view('dashboard.main.permission.edit')->with('permission', $permission);
    }

    public function update(Permission $permission, PermissionRequest $request)
    {
    	$result = $this->permissionService->update($permission, $request);
    	return redirect('dashboard/permissions');
    }

    public function destroy(Permission $permission)
    {
    	$this->permissionService->destroy($permission);
    	return 'dashboard/permission';
    }

    public function permissionData()
    {
    	return $this->permissionService->permissionData();
    }
}
