<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicsController extends Controller
{
    public function getGradeSchoolDepartment() {
    	return view('web.academics.grade-school-department');
    }

    public function getCollege() {
    	return view('web.academics.college');
    }

    public function getJuniorHighSchoolDepartment() {
    	return view('web.academics.junior-high-school-department');
    }

    public function getFreeSecondaryDistanceProgram() {
    	return view('web.academics.free-secondary-distance-program');
    }

    public function getSeniorHighSchoolDepartment() {
    	return view('web.academics.senior-high-school-department');
    }

     public function getSon() {
    	return view('web.academics.son');
    }

     public function getShom() {
    	return view('web.academics.shom');
    }

     public function getSeas() {
    	return view('web.academics.seas');
    }

     public function getSoecs() {
    	return view('web.academics.soecs');
    }

     public function getSbma() {
    	return view('web.academics.sbma');
    }

     public function getGraduateSchool() {
    	return view('web.academics.graduate-school');
    }
}
