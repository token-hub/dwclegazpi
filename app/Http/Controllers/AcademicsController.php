<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicsController extends Controller
{
    public function getGradeSchoolDepartment() {
    	return view('AcademicsPage.gradeSchoolDepartment');
    }

    public function getCollege() {
    	return view('AcademicsPage.college');
    }

    public function getJuniorHighSchoolDepartment() {
    	return view('AcademicsPage.juniorHighSchoolDepartment');
    }

    public function getFreeSecondaryDistanceProgram() {
    	return view('AcademicsPage.freeSecondaryDistanceProgram');
    }

    public function getSeniorHighSchoolDepartment() {
    	return view('AcademicsPage.seniorHighSchoolDepartment');
    }

     public function getSon() {
    	return view('AcademicsPage.son');
    }

     public function getShom() {
    	return view('AcademicsPage.shom');
    }

     public function getSeas() {
    	return view('AcademicsPage.seas');
    }

     public function getSoecs() {
    	return view('AcademicsPage.soecs');
    }

     public function getSbma() {
    	return view('AcademicsPage.sbma');
    }

     public function getGraduateSchool() {
    	return view('AcademicsPage.graduateSchool');
    }
}
