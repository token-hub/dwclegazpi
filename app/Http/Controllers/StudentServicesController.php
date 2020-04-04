<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentServicesController extends Controller
{
    public function getCommunityExtensionServices() {
    	return view('StudentServicesPage.communityExtensionServices');
    }

    public function getStudentAffairsOrganization() {
    	return view('StudentServicesPage.studentAffairsOrganization');
    }

    public function getGradeSchool() {
    	return view('StudentServicesPage.gs');
    }

    public function getJuniorHighSchool() {
    	return view('StudentServicesPage.jhs');
    }

    public function getSeniorHighSchool() {
    	return view('StudentServicesPage.shs');
    }

    public function getCollege() {
    	return view('StudentServicesPage.college');
    }

    public function getAthletics() {
    	return view('StudentServicesPage.athletics');
    }

    public function getPublication() {
    	return view('StudentServicesPage.publication');
    }

    public function getCampusMinistry() {
    	return view('StudentServicesPage.campusMinistry');
    }

    public function getSerbisyongDivine() {
    	return view('StudentServicesPage.serbisyongDivine');
    }

    public function getRegistrar() {
    	return view('StudentServicesPage.registrar');
    }

    public function getLibrary() {
    	return view('StudentServicesPage.library');
    }

    public function getResearch() {
    	return view('StudentServicesPage.research');
    }

    public function getClinic() {
    	return view('StudentServicesPage.clinic');
    }

    public function getCanteen() {
    	return view('StudentServicesPage.canteen');
    }
}
