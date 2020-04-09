<?php

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