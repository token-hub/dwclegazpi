<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class UpdatesController extends Controller
{
   public function getIndex(Request $request) {

 	# Temporary array for pagination
   		$items = [	
   					[
		   				'day' => '14',
		   				'date' => 'May',
		   				'title' => 'CHANGES/UPDATES TO MEMO NO.9, s. 2020',
		   				'hidden' => 'CHANGES/UPDATES TO MEMO NO.9, s. 2020',
		   				'category' => 'announcement',
		   				'overview' => ''
		   			],
		   			[
		   				'day' => '14',
		   				'date' => 'May',
		   				'title' => 'ACKNOWLEDGE RECEIPT OF OPEN LETTER DATED MAY 4, 2020',
		   				'hidden' => 'ACKNOWLEDGE RECEIPT OF OPEN LETTER DATED MAY 4, 2020',
		   				'category' => 'announcement',
		   				'overview' => ''
		   			],
		   			[
		   				'day' => '21',
		   				'date' => 'Apr',
		   				'title' => 'GUIDELINES IN POSTING OFFICIAL COMMUNICATION',
		   				'hidden' => 'GUIDELINES IN POSTING OFFICIAL COMMUNICATION',
		   				'category' => 'announcement',
		   				'overview' => ''
		   			],
		   			[
		   				'day' => '14',
		   				'date' => 'Apr',
		   				'title' => 'REVISED SCHOOL ACTIVITIES FOR THE 2ND SEMESTER',
		   				'hidden' => 'REVISED SCHOOL ACTIVITIES FOR THE 2ND SEMESTER',
		   				'category' => 'announcement',
		   				'overview' => 'In light of recent government updates on CoViD-19, and having in mind the safety and well-being of the school ...'
		   			],
		   			[
		   				'day' => '01',
		   				'date' => 'Apr',
		   				'title' => 'OFFICIAL RESPONSE OF THE FATHER PRESIDENT',
		   				'hidden' => 'OFFICIAL RESPONSE OF THE FATHER PRESIDENT',
		   				'category' => 'announcement',
		   				'overview' => '[INFORMATION] Official Response of the Father President pertaining to the continuation of online classes in DWC Legazpi, for reference and guidance.'
		   			],
		   			[
		   				'day' => '22',
		   				'date' => 'Mar',
		   				'title' => 'DIOCESAN CIRCULAR No. 8, Series of 2020',
		   				'hidden' => 'DIOCESAN CIRCULAR No. 8, Series of 2020',
		   				'category' => 'announcement',
		   				'overview' => ''
		   			],
		   			[
		   				'day' => '18',
		   				'date' => 'Mar',
		   				'title' => 'GUIDELINES FOR THE CONDUCT OF CLASSES',
		   				'hidden' => 'GUIDELINES FOR THE CONDUCT OF CLASSES',
		   				'category' => 'announcement',
		   				'overview' => ''
		   			],
		   			[
		   				'day' => '17',
		   				'date' => 'Mar',
		   				'title' => 'Reco-Tour 2020',
		   				'hidden' => 'Reco-Tour 2020',
		   				'category' => 'announcement',
		   				'overview' => 'Please be guided accordingly.'
		   			],
		   			[
		   				'day' => '13',
		   				'date' => 'Mar',
		   				'title' => 'DIOCESAN CIRCULAR No. 6, Series of 2020',
		   				'hidden' => 'DIOCESAN CIRCULAR No. 6, Series of 2020',
		   				'category' => 'announcement',
		   				'overview' => '[INFORMATION] Circular from the Roman Catholic Diocese of Legazpi pertaining to precautionary and other-related measures to prevent the spread of COVID19. Please be guided accordingly.'
		   			],
   					[
		   				'day' => '13',
		   				'date' => 'Mar',
		   				'title' => 'SUSPENSION OF CLASSES AND WORK: MARCH 13, 2020',
		   				'hidden' => 'SUSPENSION OF CLASSES AND WORK: MARCH 13, 2020',
		   				'category' => 'announcement',
		   				'overview' => '[OFFICIAL ANNOUNCEMENT] Memorandum from the Office of the President regarding the suspension of classes in Divine Word College of Legazpi.'
		   			],
   					[
		   				'day' => '11',
		   				'date' => 'Feb',
		   				'title' => '59th FOUNDATION ANNIVERSARY',
		   				'hidden' => '59th FOUNDATION ANNIVERSARY',
		   				'category' => 'news-and-events',
		   				'overview' => ''
		   			],
   					[
		   				'day' => '11',
		   				'date' => 'Feb',
		   				'title' => 'AN APPEAL FOR UNDERSTANDING',
		   				'hidden' => 'AN APPEAL FOR UNDERSTANDING',
		   				'category' => 'announcement',
		   				'overview' => 'On January 29, 2020 at 4:00 in the afternoon...'
		   			],
		   			[
		   				'day' => '11',
		   				'date' => 'Feb',
		   				'title' => 'NIGHT HIGH CLASS BATCH \'78 REUNION',
		   				'hidden' => 'NIGHT HIGH CLASS BATCH \'78 REUNION',
		   				'category' => 'news-and-events',
		   				'overview' => ''
		   			],
   					[
		   				'day' => '28',
		   				'date' => 'Jan',
		   				'title' => 'SHS Activity',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'PAASCU WORK'
		   			],
   					[
		   				'day' => '28',
		   				'date' => 'Jan',
		   				'title' => 'SHS Activity',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Faculty and Staff mass <br> <b>Venue:</b> Chapel & Room 101'
		   			],
   					[
		   				'day' => '28',
		   				'date' => 'Jan',
		   				'title' => 'SHS Activity',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Release of report cards for 2nd quarter <br> <b>Venue:</b> Classrooms'
		   			],
   					[
		   				'day' => '26',
		   				'date' => 'Jan',
		   				'title' => 'SHS Activity',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Tree Planting c/o UNESCO <br> <b>Venue:</b> Malabog <hr> <p> FOURTH SUNDAY MASS <br> <b>Venue:</b>  St. Raphael: </p>'
		   			],
   					[
		   				'day' => '24',
		   				'date' => 'Jan',
		   				'title' => 'SHS Activity',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Release of Master Grade Sheet'
		   			],
   					[
		   				'day' => '22',
		   				'date' => 'Jan',
		   				'title' => 'SHS Activity',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Career Talk for Grade 12 students <br> <b>Venue:</b> Gym'
		   			],
   					[
		   				'day' => '20-22',
		   				'date' => 'Jan',
		   				'title' => 'SHS Activity',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Encoding of grades in the system'
		   			],
   					[
		   				'day' => '19',
		   				'date' => 'Jan',
		   				'title' => 'SHS Activity: THIRD SUNDAY MASS',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Sponsors: Salazar and Schiermann <br> <b>Venue:</b> St.Raphael Churh'
		   			],
   					[
		   				'day' => '18',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Kick-off-Outreach Program (c/o SHEB), <br> Try out for sportsFest 2020 (c/o Sports Club) <br> <b>Venue:</b> Gotob Camalig'
		   			],
   					[
		   				'day' => '16-17',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'FEAST OF ST.ARNOLD JANSEN'
		   			],
   					[
		   				'day' => '15',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'FEAST OF ST.ARNOLD JANSEN <br> <b>Venue:</b> Gym / Classrooms'
		   			],
   					[
		   				'day' => '13-31',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Continuation of Routine and Exit Interview'
		   			],
   					[
		   				'day' => '13-14',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'SPECIAL EXAMINATION DAYS <br> <b>Venue:</b> Library'
		   			],
   				  	[
		   				'day' => '13',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Submission if the CIDAM to the coordinator'
		   			],
   					[
		   				'day' => '09',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Faculty Meeting <br> <b>Venue:</b> Room 101'
		   			],
   					[
		   				'day' => '08',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Preparation for the 2nd semester'
		   			],
   					[
		   				'day' => '07',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Continuation of the PAASCU Initial Reporting <br> <b>Vanue:</b> Room 101'
		   			],
   					[
		   				'day' => '06-31',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Continuation of Routine interview Grade 12 <br> Continuation of Exit interview Grade 12'
		   			],
   					[
		   				'day' => '06-13',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Continuation of Exit interview for Grade 12 c/o AGTC'
		   			],
   					[
		   				'day' => '06-07',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'UP Padunungan 2020 <br> <b> Venue:</b> Bicol University'
		   			],
   					[
		   				'day' => '06',
		   				'date' => 'Jan',
		   				'title' => 'SHS ACTIVITY',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Awarding-English and Book Week Celebration 2019 Faculty Meeting Re: Teachers and class Sked for 2nd semester'
		   			],
   			   		[
		   				'day' => '01',
		   				'date' => 'Jan',
		   				'title' => 'SPECIAL HOLIDAY:',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'New Year\'s Day'
		   			],
   					[
		   				'day' => '20',
		   				'date' => 'Dec',
		   				'title' => 'Institutional Christmas Party',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Institutional Christmas Party'
		   			],
   					[
		   				'day' => '16-17',
		   				'date' => 'Dec',
		   				'title' => 'DWCL Final Examination & Grade Consultation',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => 'Examination and grade consultation'
		   			],
		   			[
		   				'day' => 9,
		   				'date' => 'Dec',
		   				'title' => 'CLASSES AND WORK RESUMPTION:',
		   				'hidden' => 'CLASSES AND WORK RESUMPTION: DECEMBER 9, 2019',
		   				'category' => 'announcement',
		   				'overview' => 'IN VIEW OF THE RECENT CALAMITY THAT WE HAVE EXPERIENCED, WORK AND CLASSES WILL RESUME ON MONDAY ...'
		   			],
		   			[
		   				'day' => 4,
		   				'date' => 'Dec',
		   				'title' => 'CLASSES SUSPENSION:',
		   				'hidden' => 'CLASSES SUSPENSION: DECEMBER 4, 2019',
		   				'category' => 'announcement',
		   				'overview' => "In view of Mayor Rosal's declaration, classes in all levels remain suspended tomorrow ..."
		   			],
		   			[
		   				'day' => 3,
		   				'date' => 'Dec',
		   				'title' => 'CLASSES AND WORK SUSPENSION:',
		   				'hidden' => 'CLASSES AND WORK SUSPENSION: DECEMBER 2 AND 3, 2019',
		   				'category' => 'announcement',
		   				'overview' => "IN VIEW OF THE PDRMMC ADVISORY ON TYPHOON TISOY, CLASSES AND WORK ARE SUSPENDED ..."
		   			],
		   			[
		   				'day' => 2,
		   				'date' => 'Dec',
		   				'title' => 'CLASSES AND WORK SUSPENSION:',
		   				'hidden' => 'CLASSES AND WORK SUSPENSION: DECEMBER 2 AND 3, 2019',
		   				'category' => 'announcement',
		   				'overview' => "IN VIEW OF THE PDRMMC ADVISORY ON TYPHOON TISOY, CLASSES AND WORK ARE SUSPENDED ..."
		   			],
		   			[
		   				'day' => 30,
		   				'date' => 'Nov',
		   				'title' => 'NON-WORKING HOLIDAY:',
		   				'hidden' => 'NON-WORKING HOLIDAY: November 30, 2019',
		   				'category' => 'announcement',
		   				'overview' => "In accordance with the Memo No. 24, s. 2019, there will be no work and classes tomorrow..."
		   			],
		   			[
		   				'day' => 2,
		   				'date' => 'Nov',
		   				'title' => 'SPECIAL HOLIDAY:',
		   				'hidden' => 'SPECIAL HOLIDAY: October 31, 2019, November 1-2, 2019',
		   				'category' => 'announcement',
		   				'overview' => "All Soul's Day"
		   			],
		   			[
		   				'day' => 1,
		   				'date' => 'Nov',
		   				'title' => 'SPECIAL HOLIDAY:',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => "All Saint's Day"
		   			],
		   			[
		   				'day' => 31,
		   				'date' => 'Oct',
		   				'title' => 'SPECIAL HOLIDAY:',
		   				'hidden' => '',
		   				'category' => '',
		   				'overview' => "DWCL Institutional Holiday"
		   			]
    			];
   		
   		$paginator = $this->getPaginator($request, $items);
   		return view('web.updates.updates')->with('items', $paginator);
   }

 private function getPaginator(Request $request, $items) {
    $total = count($items); // total count of the set, this is necessary so the paginator will know the total pages to display
    $page = $request->page ? $request->page : 1; // get current page from the request, first page is null
    $perPage = 5; // how many items you want to display per page?
    $offset = ($page - 1) * $perPage; // get the offset, how many items need to be "skipped" on this page
 
    $items = array_slice($items, $offset, $perPage); // the array that we actually pass to the paginator is sliced

    return new LengthAwarePaginator($items, $total, $perPage, $page, [
        'path' => $request->url(),
        'query' => $request->query()
    ]);
}

   public function getAnnouncement() {
   		$announcements = [	
   							[
   								'title' => 'CHANGES/UPDATES TO MEMO NO.9, s. 2020',
   								'image' => 
   									[ 
   										'may-14-2020 changes-updates-memo.jpg', 
   										'may-14-2020 changes-updates-memo-2.jpg',
   										'may-14-2020 changes-updates-memo-3.jpg',
   									],
								'paragraphs' => [],
								'posted' => 'Posted on May 19, 2020 at 11:35 AM.',
   							],
   							[
   								'title' => 'ACKNOWLEDGE RECEIPT OF OPEN LETTER DATED MAY 4, 2020',
   								'image' => 
   									[ 
   										'may-14-2020 acknowledge-receipt-letter.jpg', 
   										'may-14-2020 acknowledge-receipt-letter-2.jpg'
   									],
								'paragraphs' => [],
								'posted' => 'Posted on May 19, 2020 at 11:31 AM.',
   							],
   							[
   								'title' => 'COVID-19 ENTRY PROTOCOLS AT DWCL CAMPUS',
   								'image' => [ 'may-12-2020 covid-19-entry-protocols.jpg'],
								'paragraphs' => [],
								'posted' => 'Posted on May 19, 2020 at 11:29 AM.',
   							],
   							[
   								'title' => 'ADVISORY : APRIL 29 2020',
   								'image' => [
   									'may-01-2020 advisory-01.jpg', 
   									'may-01-2020 advisory-02.jpg', 
   									'may-01-2020 advisory-03.jpg', 
   									'may-01-2020 advisory-04.jpg', 
   									'may-01-2020 advisory-05.jpg', 
   									'may-01-2020 advisory-06.jpg', 
   									'may-01-2020 advisory-07.jpg', 
   								],
								'paragraphs' => [],
								'posted' => 'Posted on May 19, 2020 at 11:27 AM.',
   							],
   							[
   								'title' => 'GUIDELINES IN POSTING OFFICIAL COMMUNICATION',
   								'image' => ['apr-21-2020 guidelines-posting-communication.jpg'],
								'paragraphs' => [],
								'posted' => 'Posted on May 19, 2020 at 11:19 AM.',
   							],
   							[
   								'title' => 'REVISED SCHOOL ACTIVITIES FOR THE 2ND SEMESTER',
   								'image' => ['apr-14-2020 revised-school-activities.jpg'],
								'paragraphs' => ['<p> In light of recent government updates on CoViD-19, and having in mind the safety and well-being of the school community, the administrators of Divine Word College of Legazpi ,headed by Rev. Fr. Nielo M. Cantilado, SVD, released this Memorandum pertaining to the Revised School Activities for the 2nd Semester, AY 2019-2020. </p>'],
								'posted' => 'Posted on May 19, 2020 at 11:16 AM.',
   							],
   							[
   								'title' => 'OFFICIAL RESPONSE OF THE FATHER PRESIDENT',
   								'image' => ['apr-01-2020 father-response.jpg'],
								'paragraphs' => ['<p> [INFORMATION] Official Response of the Father President pertaining to the continuation of online classes in DWC Legazpi, for reference and guidance. </p>'],
								'posted' => 'Posted on May 19, 2020 at 11:13 AM.',
   							],
   							[
   								'title' => 'DIOCESAN CIRCULAR No. 8, Series of 2020',
   								'image' => ['diocesan-circular-no.8.jpg'],
								'paragraphs' => [],
								'posted' => 'Posted on May 19, 2020 at 11:11 AM.',
   							],
   							[
   								'title' => 'GUIDELINES FOR THE CONDUCT OF CLASSES',
   								'image' => ['mar-17-2020 guideline-classes.jpg'],
								'paragraphs' => [],
								'posted' => 'Posted on May 19, 2020 at 11:09 AM.',
   							],
   							[
   								'title' => 'Reco-Tour 2020',
   								'image' => ['reco-tour-2020.jpg'],
								'paragraphs' => ['<p> Please be guided accordingly. </p>'],
								'posted' => 'Posted on May 19, 2020 at 11:05 AM.',
   							],
   							[
   								'title' => 'DIOCESAN CIRCULAR No. 6, Series of 2020',
   								'image' => 
   										[
   											'diocesan-circular-no.6-1.jpg',
   											'diocesan-circular-no.6-2.jpg'
   										],
								'paragraphs' => ['<p> [INFORMATION] Circular from the Roman Catholic Diocese of Legazpi pertaining to precautionary and other-related measures to prevent the spread of COVID19. Please be guided accordingly. </p>'],
								'posted' => 'Posted on May 19, 2020 at 11:01 AM.',
   							],
   							[
   								'title' => 'SUSPENSION OF CLASSES AND WORK: MARCH 13, 2020',
   								'image' => ['mar-13-2020 suspension-class-work.jpg'],
								'paragraphs' => ['<p> [OFFICIAL ANNOUNCEMENT] Memorandum from the Office of the President regarding the suspension of classes in Divine Word College of Legazpi. </p>'],
								'posted' => 'Posted on May 19, 2020 at 10:09 AM.',
   							],
   							[
   								'title' => 'NON-WORKING HOLIDAY: February 24-25, 2019',
   								'image' => ['feb-21-2020 non-working.png'],
								'paragraphs' => [],
								'posted' => 'Posted on February 21, 2020 at 4:35 PM.',
   							],
   							[
   								'title' => 'AN APPEAL FOR UNDERSTANDING',
   								'image' => ['appeal.png'],
								'paragraphs' => [],
								'posted' => 'Posted on February 07, 2020 at 1:51 PM.',
   							],
   							[
   								'title' => 'SPECIAL HOLIDAY: JANUARY 25, 2020',
   								'image' => [],
								'paragraphs' => [
													'<h3>TO THE DWCL COMMUNITY:</h3>
													<p>Please be informed that January 25, 2020 (Saturday) is declared as a special holiday in observance of the Chiness New Year.</p>
													<p>In View of this, there will be no work and class in all levels</p>
													<p>PLEASE BE GUIDED ACCORDINGLY.</p>
													<div class="littleSpace">
														<p>Fr. Nielo M. Cantilado, SVD</p>
														<p>President</p>
													</div>'	
												],
								'posted' => 'Posted on December 09, 2019 at 10:25AM',
   							],
   							[
   								'title' => 'CLASSES AND WORK RESUMPTION: DECEMBER 9, 2019',
   								'image' => [],
								'paragraphs' => [
													'<h3>TO THE DWCL COMMUNITY:</h3>
													<p>IN VIEW OF THE RECENT CALAMITY THAT WE HAVE EXPERIENCED, WORK AND CLASSES WILL RESUME ON MONDAY, DEC. 9, 2019.</p>
													<p>PLEASE BE GUIDED ACCORDINGLY.</p>
													<div class="littleSpace">
														<p>Fr. Nielo M. Cantilado, SVD</p>
														<p>President</p>
													</div>'
												],
								'posted' => 'Posted on December 09, 2019 at 10:25AM.',
   							],
   							[
   								'title' => 'CLASSES SUSPENSION: DECEMBER 4, 2019',
   								'image' => [],
								'paragraphs' => [
													'<h3>TO THE DWCL COMMUNITY:</h3>
														<p>In view of Mayor Rosal\'s declaration, classes in all levels remain suspended tomorrow, Wednesday, Dec. 4, 2019. / However, work will already resume tomorrow so that employees can check and prepare their offices.</p>
														<p>PLEASE BE GUIDED ACCORDINGLY.</p>
														<div class="littleSpace">
															<p>Fr. Nielo M. Cantilado, SVD</p>
															<p>President</p>
														</div>'
												],
								'posted' => 'Posted on December 09, 2019 at 10:16AM.',
   							],
   							[
								'title' => 'CLASSES AND WORK SUSPENSION: DECEMBER 2 & 3, 2019',
								'image' => [],
								'paragraphs' => [
													'<h3>TO THE DWCL COMMUNITY:</h3>
													<p>IN VIEW OF THE PDRMMC ADVISORY ON TYPHOON TISOY, CLASSES AND WORK ARE SUSPENDED ON DECEMBER 2 AND 3, 2019 (MONDAY AND TUESDAY).</p>
													<p>HOWEVER, ALL EMPLOYEES ARE REQUIRED TO CAUSE THE SAFEKEEPING OF THEIR RESPECTIVE OFFICES.</p>
													<p>KEEP SAFE EVERYONE</p>
													<p>PLEASE BE GUIDED ACCORDINGLY.</p>
													<div class="littleSpace">
														<p>Fr. Nielo M. Cantilado, SVD</p>
														<p>President</p>
													</div>'
												],
								'posted' => 'Posted on December 09, 2019 at 9:54AM',
							],
							[
								'title' => 'NON-WORKING HOLIDAY: November 30, 2019',
								'image' => [],
								'paragraphs' => [
													'<h3>In accordance with the Memo No. 24, s. 2019, there will be no work and classes tomorrow.</h3>
													<p>November 30, 2019 (Saturday) in celebration of Bonifacio Day (Regular Non-Working Holiday)</p>
													<p>Classes and work will resume on December 2, 2019 (Monday)</p>
													<p>Please be guided, Divinians.</p>'
												],
								'posted' => 'Posted on November 29, 2019 at 4:28PM.',
							],
							[
								'title' => 'SPECIAL HOLIDAY: February 16, 2018',
								'image' => [],
								'paragraphs' => [
													'<p>Office of the President</p>
													<p>Memo No. 06, s.2018</p>
													<p>12 February 2018</p>
													<p>To: The DWCL Community</p>
													<p>Subject: February 16, 2018, a Special Holiday</p><hr>
													<p>Please be informed that February 16, 2018(Friday) is declared as a special holiday by virtue of Proclamation No. 269, in observance of the Chinese New Year.</p>
													<p>In view of this, there will be no work and classes in all levels. Classes and work will resume on Saturday, February 17, 2018.</p>
													<p>Please be guided accordingly.</p>
													<div class="littleSpace">
														<p>Fr. Nielo M. Cantilado, SVD</p>
														<p>President</p>
													</div>'
												],
								'posted' => 'Posted on February 12, 2018 at 3:03 PM.',
							],
							[
								'title' => 'MT. MAYON ADVISORY:SUSPENSION OF CLASSES',
								'image' => ['suspension.jpg'],
								'paragraphs' => [],
								'posted' => 'Posted on January 26, 2018 at 7:59 AM.',
							],
							[
								'title' => 'SUSPENSION OF CLASSES',
								'image' => [],
								'paragraphs' => [
													'<p>15 January 2018</p>
													<p>Memo No. 01, s. 2018</p>
													<div class="littleSpace">
														<p>To: The Deans and Principals</p>
														<p>Subject: Suspension of Classes</p>
													</div><hr>
													<p>In view of the advisory from Hon. Noel Rosal, Mayor of Legazpi City, classes in all levels are suspended starting at 12 noon today, January 15, 2018.</p>
													<p>Please be guided accordingly.</p>
													<p>May St. Arnold Janssen, Founder of the Society of the Divine Word (SVD), whose Feast Day we celebrate today, guard and protect us all.</p>
													<p>signed:</p>
													<div class="littleSpace">
														<p>Fr. Nielo M. Cantilado, SVD</p>
														<p>President</p>
													</div>'
												],
								'posted' => 'Posted on January 15, 2018 at 2:24 PM.',
							],
							[
								'title' => 'DWC-Legazpi Community – Important Announcements',
								'image' => [],
								'paragraphs' => [
													'<div class="littleSpace">
													<p>From the Office of the President</p>
													<p>Memon No. 25, s. 2017</p>
												</div>
												<div class="littleSpace">
													<p>To: DWCL COMMUNITY</p>
													<p>Subject: IMPORTANT ANNOUNCEMENTS</p>
												</div><hr>
												<p>Please be informed of the following important announcements:</p>
												<ul>
													<li>Institutional Christmas Party – December 16,2017, 7:00 a.m. at St. Joseph Freinademetz Gymnasium</li>
													<li>Christmas Vacation begins – December 20,2017</li>
													<li>Regular classes and work resume – January 3 ,2017</li>
												</ul>
												<p>MAOGMANG PASKO ASIN MAOGMANG BAGONG TAON 2018!</p>
												<p>Please be guided accordingly.</p>
												<p>signed:</p>
												<div class="littleSpace">
													<p>Fr. Nielo M. Cantilado, SVD</p>
													<p>President</p>
												</div>'
												],
								'posted' => 'Posted on December 15, 2017 at 10:10 AM.',
							],
							[
								'title' => 'PDRRMC Advisory No. 4',
								'image' => [],
								'paragraphs' => [
													'<h3 class="dwclBlue">Office of the President</h3>
													<p>December 14, 2017</p>
													<p>Memo No. 26, s. 2017</p>
													<p>To: DWCL Community</p><hr>
													<p>Subject: PDRRMC Advisory No. 4</p>
													<p>As per PDRRMC Advisory No. 4 on TD Urduja, classes in all levels are suspended at 1:00 p.m., December 14 and 15, 2017.</p>
													<p>Prelim Examinations are re-scheduled as follows:</p>
													<ul>
														<li>December 18, 2017 for MWF classes</li>
														<li>December 19, 2017 for TTH classes</li>
													</ul>
													<p>Please be guided accordingly.</p>
													<div class="littleSpace">
														<p>(SGD)Fr. Nielo M. Cantilado, SVD</p>
														<p>President</p>
													</div>'
												],
								'posted' => 'Posted on February 07, 2020 at 1:51 PM.',
							]
   						];

   		return view('web.updates.announcement')->with('announcements', $announcements);
   }

    public function getNewsAndEvents() {
   		$newsAndEvents = [
							[
								'title' => '59th FOUNDATION ANNIVERSARY',
								'image' => ['foundation_2020.jpg'],
								'paragraphs' => [],
								'posted' => 'Posted on February 11, 2019 at 8:20 AM.',
								
							],
							[
								'title' => 'THE NEW NORTH CAMPUS MAIN GATE',
								'image' => ['gate.jpg'],
								'paragraphs' => [],
								'posted' => 'Posted on February 11, 2019 at 8:20 AM.'

							],
							[
								'title' => 'NIGHT HIGH CLASS BATCH \'78 REUNION',
								'image' => ['batch-78-reunion-1.jpg', 'batch-78-reunion-2.jpg', 'batch-78-reunion-3.jpg', 'batch-78-reunion-4.jpg'],
								'paragraphs' => ['<p><b>WHEN:</b></p><p>&nbsp;&nbsp;&nbsp;&nbsp;November 30, 2019</p>', '<p><b>WHERE:</b></p><p>&nbsp;&nbsp;&nbsp;&nbsp;Bogtong Elementary School</p><p>&nbsp;&nbsp;&nbsp;&nbsp;Covered Court</p><p>&nbsp;&nbsp;&nbsp;&nbsp;7:00 A.M. - 7:00 P.M.</p>'],
								'posted' => 'Posted on February 11, 2019 at 8:20 AM.'
							],
							[
								'title' => 'PASKUHAN SA 2D ALBAY (AYALA MALLS)',
								'image' => ['paskuhan.png'],
								'paragraphs' => [],
								'posted' => 'Posted on November 28, 2019 at 9:37 AM.'
							],
							[
								'title' => 'PASTORAL EXHORTATION OF THE CBCP – "Rejoice and be Glad"',
								'image' => ['DIOCESE1.jpg', 'DIOCESE2.jpg', 'DIOCESE3.jpg', 'DIOCESE4.jpg', 'DIOCESE5.jpg', 'DIOCESE6.jpg'],
								'paragraphs' => [],
								'posted' => 'Posted on July 13, 2018 at 4:14 PM.'
							],
							[
								'title' => 'DIOCESE OF LEGAZPI, Pastoral Letter No. 1, Series of 2018',
								'image' => ['DIOCESE7.jpg', 'DIOCESE8.jpg'],
								'paragraphs' => [],
								'posted' => 'Posted on July 10, 2018 at 5:14 PM.'
							],
							[
								'title' => 'DWCL HOLDS RELIEF DRIVE FOR MAYON EVACUEES',
								'image' => [],
								'paragraphs' => [
													'<h3 class="dwclBlue">DWCL HOLDS RELIEF DRIVE FOR MAYON EVACUEES</h3>
													<h4 class="dwclBlue">by Russel M. Rognao | The Channel</h4>
													<p>Team Divine, headed by Rev. Fr. Nielo M. Cantilado, SVD, President of Divine Word College of Legazpi, and Rev. Fr. Paulus Karmani, SVD, Vice President for Administration and Finance, conducted DWCL Operation Mayon 2018 for the evacuees from Brgy. Alcala, Daraga, Albay at Anislag National High School last January 27, 29, and February 3, 2018.</p>

													<p>The Community Extension Service (CES) Coordinators and volunteer-employees also participated in this activity, together with students taking up Theology 6 (Community Immersion) and BS Psychology students doing their Practicum in Psychology II.</p>

													<h4>In Action</h4>
													<p>On January 27, 2018, Team Divine distributed relief packs to the 278 evacuee families at Anislag National High School. The team was assisted by the barangay officials for proper distribution of the packs. On January 29, the team returned to the said evacuation center to distribute water containers, each filled with 10 liters of water, for all the families.</p>

													<p>On February 3, the Theology 6 students organized a soup kitchen and Catechesis for the children and facilitated parlor games for them. On the other hand, the BS Psychology practicum students, led by Mr. Niño Daep, psychology faculty and Admission, Guidance, and Testing Center psychometrician, conducted a psychosocial assessment of the evacuees.</p>

													<p>Meanwhile, the Divinian students and employees affected by the Mayon Eruption were also given relief packs through the CES Coordinators of each department.</p>'
												],
								'posted' => 'Posted on February 17, 2018 at 12:01 PM.'
							],
							[
								'title' => 'ASH WEDNESDAY',
								'image' => ['ash.jpg'],
								'paragraphs' => [],
								'posted' => 'Posted on February 13, 2018 at 5:32 PM.'
							],
							[
								'title' => 'SPECIAL HOLIDAY:February 16, 2018',
								'image' => [],
								'paragraphs' => [
												'<p>Office of the President</p>
													<p>Memo No. 06, s.2018</p>
													<p>12 February 2018</p>
													<p>To: The DWCL Community</p>
													<p>Subject: February 16, 2018, a Special Holiday</p><hr>
													<p>Please be informed that February 16, 2018(Friday) is declared as a special holiday by virtue of Proclamation No. 269, in observance of the Chinese New Year.</p>
													<p>In view of this, there will be no work and classes in all levels. Classes and work will resume on Saturday, February 17, 2018.</p>
													<p>Please be guided accordingly.</p>
													<div class="littleSpace">
														<p>Fr. Nielo M. Cantilado, SVD</p>
														<p>President</p>
													</div>'
												],
								'posted' => 'Posted on February 12, 2018 at 3:03 PM.'
							],
						 ];

   		return view('web.updates.news-and-events')->with('newsAndEvents', $newsAndEvents);
   }
}
