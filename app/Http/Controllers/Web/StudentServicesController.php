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
                        'title' => 'Banhi',
                        'overview' => 'A Research Monograph for the Grade School Department',
                    ],
                    [
                        'day' => '22',
                        'month' => 'Jun',
                        'title' => 'Kadunung',
                        'overview' => 'A Research Monograph of the Office of Research',
                    ],
                    [
                        'day' => '22',
                        'month' => 'Jun',
                        'title' => 'Lampara',
                        'overview' => 'A Research Monograph for the School of Nursing',
                    ],
                    [
                        'day' => '22',
                        'month' => 'Jun',
                        'title' => 'Liyab',
                        'overview' => 'A Research Monograph for the Junior High School Department',
                    ],
                    [
                        'day' => '22',
                        'month' => 'Jun',
                        'title' => 'Namit',
                        'overview' => 'A Research Monograph for the School of Hospitality Management',
                    ],
                    [
                        'day' => '22',
                        'month' => 'Jun',
                        'title' => 'Ningas',
                        'overview' => 'A Research Monograph for the School of Education, Arts and Sciences',
                    ],
                    [
                        'day' => '22',
                        'month' => 'Jun',
                        'title' => 'Pananaw',
                        'overview' => 'The DWCL Research Journal',
                    ],
                    [
                        'day' => '22',
                        'month' => 'Jun',
                        'title' => 'Panganganinag',
                        'overview' => 'A Research Monograph for the School of Business, Management and Accountancy',
                    ],
                    [
                        'day' => '22',
                        'month' => 'Jun',
                        'title' => 'Saliksik',
                        'overview' => 'A Research Monograph for the Graduate School of  Business and Management',
                    ],
                    [
                        'day' => '22',
                        'month' => 'Jun',
                        'title' => 'Tinta',
                        'overview' => 'A Research Monograph for the Senior High School Department',
                    ],
 
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