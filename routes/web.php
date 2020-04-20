<?php

Route::get('/dashboard/login', 'Auth\LoginController@getLogin');
Route::post('/dashboard/logout', 'Auth\LoginController@postLogout');
Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::post('/dashboard/login', 'Auth\LoginController@postLogin');

AdvancedRoute::controllers([
	'/' => 'HomeController',
    '/about-us' => 'AboutUsController',
    '/admission' => 'AdmissionController',
    '/academics' => 'AcademicsController',
    '/student-services' => 'StudentServicesController',
    '/career' => 'CareerController',
    '/gallery' => 'GalleryController',
    '/updates' => 'UpdatesController',
    '/contact-us' => 'ContactUsController',
    '/alumni' => 'AlumniController',
    '/dashboard' => 'DashboardController',
    '/email' => 'EmailController',
]);

Route::group([ 'middleware' => ['auth', 'verified'], 'verify' => true], function () { 
  Route::get('/dashboard/register', 'Auth\RegisterController@getRegistration');
  Route::post('/dashboard/register', 'Auth\RegisterController@postRegistration');
  AdvancedRoute::controller('/dashboard', 'DashboardController');
});

// Auth::routes(['verify' => true]);

