<?php

AdvancedRoute::controllers([
	'/' => 'Web\HomeController',
    '/about-us' => 'Web\AboutUsController',
    '/admission' => 'Web\AdmissionController',
    '/academics' => 'Web\AcademicsController',
    '/student-services' => 'Web\StudentServicesController',
    '/career' => 'Web\CareerController',
    '/gallery' => 'Web\GalleryController',
    '/updates' => 'Web\UpdatesController',
    '/contact-us' => 'Web\ContactUsController',
    '/alumni' => 'Web\AlumniController',
    '/email' => 'Web\EmailController',
]);

Route::namespace('Dashboard')->prefix('dashboard')->group(function () { 

  Route::get('', 'Auth\LoginController@index');

  Route::post('', 'Auth\LoginController@store');

  Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');

  Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');

  Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

  Route::get('/home', 'DashboardController@index');

  Route::group([ 'middleware' => ['auth', 'verified'], 'verify' => true], function () { 

    Route::get('/register', 'Auth\RegisterController@index');
    
    Route::post('/register', 'Auth\RegisterController@store');

    Route::post('/logout', 'Auth\LoginController@destroy');

    Route::get('/users', 'DashboardUserController@index');

    Route::get('/users/{user}/edit', 'DashboardUserController@edit');

    Route::patch('/users/{user}', 'DashboardUserController@update');

    Route::delete('/users/{user}', 'DashboardUserController@delete');

    Route::get('/user-data', 'DashboardUserController@userData');

    Route::get('/profile/{user}', 'DashboardUserProfileController@show');
    
    Route::get('/profile/{user}/edit', 'DashboardUserProfileController@edit');
    
    Route::patch('/profile/{id}', 'DashboardUserProfileController@update');

    Route::get('/logs', 'DashboardLogController@index');
    
    Route::get('/logs/{id}/date/{date}', 'DashboardLogController@show');
    
    Route::get('/logsData', 'DashboardLogController@logsData');

    Route::get('/images-active', 'DashboardImageController@active');

    Route::post('/images-active/image-arrange-or-deactivate', 'DashboardImageController@arrangeOrDeactivate');
    
    Route::get('/images-inactive', 'DashboardImageController@inactive');
    
    Route::post('/images-inactive/image-remove-or-activate', 'DashboardImageController@removeOrActivate');
    
    Route::post('/images-inactive/image-upload', 'DashboardImageUploadController@store');

    Route::get('roles', 'DashboardRoleController@index');

    Route::get('role-data', 'DashboardRoleController@roleData');

    Route::get('roles/create', 'DashboardRoleController@create');

    Route::post('roles', 'DashboardRoleController@store');

    Route::get('roles/{role}/edit', 'DashboardRoleController@edit');

    Route::patch('roles/{role}', 'DashboardRoleController@update');

    Route::delete('roles/{role}', 'DashboardRoleController@destroy');

    Route::get('permissions', 'DashboardPermissionController@index');

    Route::get('permission-data', 'DashboardPermissionController@permissionData');

    Route::get('permissions/create', 'DashboardPermissionController@create');

    Route::post('permissions', 'DashboardPermissionController@store');

    Route::get('permissions/{permission}/edit', 'DashboardPermissionController@edit');

    Route::patch('permissions/{permission}', 'DashboardPermissionController@update');

    Route::delete('permissions/{permission}', 'DashboardPermissionController@destroy');
  });

});

// Route::get('/sample', function(){
//   $user = App\Models\Entities\User::first();
//   $user->roles()->sync([3]);
//   // dd($user->roles);

//   // foreach ($user->roles as $key => $value) {
     
//   //     dd($value->title);
//   // }
//   // $role = App\Models\Entities\Roles::first();

//   // $role->permissions()->attach([1, 3]);

// });