<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\PaginatorTrait;

class StudentServicesController extends Controller
{
    use PaginatorTrait;

    public function getCommunityExtensionServices() {
    	return view('web.student-services.community-extension-services');
    }

    public function getStudentAffairsOrganization() {
    	return view('web.student-services.student-affairs-organization');
    }

    public function getGradeSchool() {
    	return view('web.student-services.gs');
    }

    public function getJuniorHighSchool() {
    	return view('web.student-services.jhs');
    }

    public function getSeniorHighSchool() {
    	return view('web.student-services.shs');
    }

    public function getCollege() {
    	return view('web.student-services.college');
    }

    public function getAthletics() {
    	return view('web.student-services.athletics');
    }

    public function getPublication() {
    	return view('web.student-services.publication');
    }

    public function getCampusMinistry() {
    	return view('web.student-services.campus-ministry');
    }

    public function getSerbisyongDivine() {
    	return view('web.student-services.serbisyong-divine');
    }

    public function getRegistrar() {
    	return view('web.student-services.registrar');
    }

    public function getLibrary() {
    	return view('web.student-services.library');
    }

    public function getResearch(Request $request) {

       $pdfs = [
                    [
                        'day' => '22',
                        'month' => 'Jun',
                        'title' => 'sample',
                        'overview' => 'this is a sample pdf',
                        'category' => 'pdf'
                    ]  
                ];

        $paginator = $this->getPaginator($request, $pdfs);

    	return view('web.student-services.research')->with('pdfs', $paginator);
    }

    public function getResearchPdf($pdf) {
        return view('web.student-services.research-pdf')->with('pdf', $pdf);
    }

    public function getClinic() {
    	return view('web.student-services.clinic');
    }

    public function getCanteen() {
    	return view('web.student-services.canteen');
    }
}