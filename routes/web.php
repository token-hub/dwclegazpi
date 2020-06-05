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

  Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

  Route::group([ 'middleware' => ['auth', 'verified'], 'verify' => true], function () { 

    Route::get('/home', 'DashboardController@index');

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
    
    Route::get('/log-data', 'DashboardLogController@logsData');

    Route::get('/slides-active', 'DashboardActiveSlideController@index');

    Route::patch('/slides-active/deactivate', 'DashboardActiveSlideController@destroy');

    Route::patch('/slides-active/arrange', 'DashboardActiveSlideController@update');
    
    Route::get('/slides-inactive', 'DashboardInactiveSlideController@index');
    
    Route::delete('/slides-inactive/remove', 'DashboardInactiveSlideController@destroy');

    Route::patch('/slides-inactive/activate', 'DashboardInactiveSlideController@update');

    Route::post('/slides-inactive/image-upload', 'DashboardInactiveSlideController@store');

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

    Route::get('updates', 'DashboardUpdateController@index');

    Route::get('updates/create', 'DashboardUpdateController@create');

    Route::post('updates', 'DashboardUpdateController@store');
  });

});