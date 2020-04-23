<?php

Route::get('/dashboard', 'Dashboard\Auth\LoginController@index');
Route::post('/dashboard', 'Dashboard\Auth\LoginController@store');

Route::get('/email/verify', 'Dashboard\Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}', 'Dashboard\Auth\VerificationController@verify')->name('verification.verify');
Route::get('/email/resend', 'Dashboard\Auth\VerificationController@resend')->name('verification.resend');

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

Route::group([ 'middleware' => ['auth', 'verified'], 'verify' => true], function () { 
  Route::get('/dashboard/home', 'Dashboard\DashboardController@index');
  Route::get('/dashboard/register', 'Dashboard\Auth\RegisterController@index');
  Route::post('/dashboard/register', 'Dashboard\Auth\RegisterController@store');

  Route::post('/dashboard/logout', 'Dashboard\Auth\LoginController@destroy');

  Route::get('/dashboard/profile/{user}', 'Dashboard\DashboardProfileController@show');
  Route::get('/dashboard/profile/{user}/edit', 'Dashboard\DashboardProfileController@edit');
  Route::patch('/dashboard/profile/{id}', 'Dashboard\DashboardProfileController@update');

  Route::get('/dashboard/logs', 'Dashboard\DashboardLogsController@index');
  Route::get('/dashboard/logs/{id}/date/{date}', 'Dashboard\DashboardLogsController@store');
  Route::get('/dashboard/logsData', 'Dashboard\DashboardLogsDataController@index');
  
});


