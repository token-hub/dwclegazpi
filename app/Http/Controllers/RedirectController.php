<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function search($data) {

    	#Tempo codes ---------------
    	$announcement = [
    		'CLASSES AND WORK RESUMPTION: DECEMBER 9, 2019',
			'CLASSES SUSPENSION: DECEMBER 4, 2019',
			'CLASSES AND WORK SUSPENSION: DECEMBER 2 AND 3, 2019',
			'NON-WORKING HOLIDAY: November 30, 2019',
			'SPECIAL HOLIDAY: October 31, 2019, November 1-2, 2019',
			'SPECIAL HOLIDAY: February 16, 2018',
			'MT. MAYON ADVISORY:SUSPENSION OF CLASSES',
			'SUSPENSION OF CLASSES',
			'DWC-Legazpi Community – Important Announcements',
			'PDRRMC Advisory No. 4',
			'SPECIAL HOLIDAY: JANUARY 25, 2020',
			'AN APPEAL FOR UNDERSTANDING',
			'NON-WORKING HOLIDAY: February 24-25, 2019'
    	];

    	$newsAndEvents = [
    		'PASKUHAN SA 2D ALBAY (AYALA MALLS)',
			'NIGHT HIGH CLASS BATCH 78 REUNION',
			'PASTORAL EXHORTATION OF THE CBCP – "Rejoice and be Glad"',
			'DIOCESE OF LEGAZPI, Pastoral Letter No. 1, Series of 2018',
			'DWCL HOLDS RELIEF DRIVE FOR MAYON EVACUEES',
			'ASH WEDNESDAY',
			'SPECIAL HOLIDAY:February 16, 2018'
    	];

    	$result = in_array($data, $announcement) ? 'announcement' : 'news-and-events';
    	return redirect('updates/'.$result)->with('title', $data);
    }
}
