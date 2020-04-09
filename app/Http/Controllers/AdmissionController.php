<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmissionController extends Controller
{
	public function getIndex() {
    	return view('web.admission.admission');
    }

    public function getGradeSchool() {
    	return view('web.admission.grade-school');
    }

    public function getCollege() {
    	return view('web.admission.college');
    }

    public function getFreeSecondaryDistance() {
    	return view('web.admission.free-secondary-distance');
    }

    public function getGraduateSchool() {
    	return view('web.admission.graduate-school');
    }

    public function getJuniorHighSchool() {
    	return view('web.admission.junior-high-school');
    }

    public function getScholarship() {
    	return view('web.admission.scholarship');
    }

    public function getSeniorHighSchool() {
    	return view('web.admission.senior-high-school');
    }
}
