<?php
Route::get('/dashboard/login', 'Auth\LoginController@getLogin');
Route::post('/dashboard/login', 'Auth\LoginController@postLogin');

Route::group(['middleware' => ['auth.custom']], function () {
   Route::post('/dashboard/logout', 'Auth\LoginController@postLogout');
   Route::get('/dashboard/register', 'Auth\RegisterController@getRegistration');
   Route::post('/dashboard/register', 'Auth\RegisterController@postRegistration');
});

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

Auth::routes(['verify' => true]);