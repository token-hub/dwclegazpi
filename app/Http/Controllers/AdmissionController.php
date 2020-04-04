<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmissionController extends Controller
{
	public function index() {
    	return view('AdmissionPage.admission');
    }

    public function getGradeSchool() {
    	return view('AdmissionPage.gradeSchool');
    }

    public function getCollege() {
    	return view('AdmissionPage.college');
    }

    public function getFreeSecondaryDistance() {
    	return view('AdmissionPage.freeSecondaryDistance');
    }

    public function getGraduateSchool() {
    	return view('AdmissionPage.graduateSchool');
    }

    public function getJuniorHighSchool() {
    	return view('AdmissionPage.juniorHighSchool');
    }

    public function getScholarship() {
    	return view('AdmissionPage.scholarship');
    }

    public function getSeniorHighSchool() {
    	return view('AdmissionPage.seniorHighSchool');
    }
}
