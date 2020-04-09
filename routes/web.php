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

// Auth::routes(['verify' => true]);

// Route::get('/dashboard/profile_edit/{id}', 'DashboardController@getProfileEdit')->name('edit_user');
// Route::get('/dashboard/profile-update/{id}/update', 'DashboardController@getProfileUpdate')->name('update-user');

// Route::resource('dashboard', 'DashboardController');
AdvancedRoute::controllers([
	 // '/' => 'HomeController',
  //   '/about-us' => 'AboutUsController',
  //   '/admission' => 'AdmissionController',
  //   '/academics' => 'AcademicsController',
  //   '/student-services' => 'StudentServicesController',
  //   '/career' => 'CareerController',
  //   '/gallery' => 'GalleryController',
  //   '/updates' => 'UpdatesController',
  //   '/contact-us' => 'ContactUsController',
  //   '/alumni' => 'AlumniController',
    '/dashboard' => 'DashboardController',
    '/email' => 'EmailController',
]);

Auth::routes();