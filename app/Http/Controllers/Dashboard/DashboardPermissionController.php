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
        $this->authorize('viewAny', Permission::class);

    	return view('dashboard.main.permission.index');
    }

    public function create()
    {
        $this->authorize('create', Permission::class);

    	return view('dashboard.main.permission.create');
    }

    public function store(PermissionRequest $request)
    {
        $this->authorize('create', Permission::class);

    	$result = $this->permissionService->store($request);
    	
        return redirect('dashboard/permissions')->with('notification', $result);
    }

    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);

    	return view('dashboard.main.permission.edit')->with('permission', $permission);
    }

    public function update(Permission $permission, PermissionRequest $request)
    {
        $this->authorize('update', $permission);

    	$result = $this->permissionService->update($permission, $request);

    	return redirect('dashboard/permissions')->with('notification', $result);
    }

    public function destroy(Permission $permission)
    {
        $this->authorize('delete', $permission);

    	$this->permissionService->destroy($permission);
    	
        return 'dashboard/permission';
    }

    public function permissionData(Permission $permission)
    {
        $allowedAction = [];
        
        if (policy($permission)->update(\Auth::user(), $permission)) {
            array_push($allowedAction, 'update');
        }

        if (policy($permission)->delete(\Auth::user(), $permission)) {
            array_push($allowedAction, 'delete');
        }

    	return $this->permissionService->permissionData($allowedAction);
    }
}
