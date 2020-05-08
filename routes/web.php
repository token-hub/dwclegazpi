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

    Route::get('/users-data', 'DashboardUserController@userData');

    Route::get('/profile/{user}', 'DashboardUserProfileController@show');
    
    Route::get('/profile/{user}/edit', 'DashboardUserProfileController@edit');
    
    Route::patch('/profile/{id}', 'DashboardUserProfileController@update');

    Route::get('/logs', 'DashboardLogsController@index');
    
    Route::get('/logs/{id}/date/{date}', 'DashboardLogsController@show');
    
    Route::get('/logsData', 'DashboardLogsController@logsData');

    Route::get('/images-active', 'DashboardImagesController@active');

    Route::post('/images-active/image-arrange-or-deactivate', 'DashboardImagesController@arrangeOrDeactivate');
    
    Route::get('/images-inactive', 'DashboardImagesController@inactive');
    
    Route::post('/images-inactive/image-remove-or-activate', 'DashboardImagesController@removeOrActivate');
    
    Route::post('/images-inactive/image-upload', 'DashboardImagesUploadController@store');
  });

});


  // Route::get('/sample', function(){
  //   $permission = App\Models\Entities\Permissions::first();

  //   $role = App\Models\Entities\Roles::first();

  //   $role->permissions()->attach([1, 3]);

  // });