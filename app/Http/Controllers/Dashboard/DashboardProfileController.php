<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Requests\UpdateUserFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services\ProfileService;
use App\Models\Entities\User;


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

    public function update($id, UpdateUserFormRequest $request, ProfileService $profileService) 
    {
    	$result = $profileService->update(array_merge($request->toArray(), ['update_user_id' => $id]));

    	return redirect('dashboard/profile/'.$id)->with('notification', $result);
    }
}
