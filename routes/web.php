<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# single route using advanceRoute
// AdvancedRoute::controller('/auth', 'AuthController');

Route::get('/', 'HomeController@index');
Route::get('/admission', 'AdmissionController@index');
Route::get('/career', 'CareerController@index');
Route::get('/gallery', 'GalleryController@index');
Route::get('/updates', 'UpdatesController@index');
Route::get('/contact-us', 'ContactUsController@index');
Route::get('/alumni', 'AlumniController@index');
Route::get('/redirect/{data}', 'RedirectController@search');
Route::post('/email', 'EmailController@send');

Auth::routes(['verify' => true]);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/registration', 'Auth\RegisterController@showRegistrationForm');
Route::get('/dashboard/profile_edit/{id}', 'DashboardController@getProfileEdit')->name('edit_user');
Route::get('/dashboard/profile-update/{id}/update', 'DashboardController@getProfileUpdate')->name('update-user');

// Route::resource('dashboard', 'DashboardController');
AdvancedRoute::controllers([
    '/about-us' => 'AboutUsController',
    '/admission' => 'AdmissionController',
    '/academics' => 'AcademicsController',
    '/student-services' => 'StudentServicesController',
    '/updates' => 'UpdatesController',
    '/dashboard' => 'DashboardController',
]);

Auth::routes();