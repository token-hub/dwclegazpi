<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getIndex()
    {
        $homeArrays = [
                        'newsAndEvents' => [
                                                [
                                                    'title' => '59th FOUNDATION ANNIVERSARY',
                                                    'image' => 'foundation_2020_home.jpg'
                                                ],
                                                [
                                                    'title' => 'THE NEW NORTH CAMPUS MAIN GATE',
                                                    'image' => 'gate.jpg'
                                                ],
                                                [
                                                    'title' => 'NIGHT HIGH CLASS BATCH \'78 REUNION',
                                                    'image' => 'alumni.png'
                                                ]
                                           ],
                        'announcements' => [
                                            'left' => [ 
                                                         [
                                                            'date' => ['Feb', '21'],
                                                            'title' => 'NON-WORKING HOLIDAY',
                                                            'hiddenLink' => 'NON-WORKING HOLIDAY: February 24-25, 2019'
                                                        ],
                                                        [
                                                            'date' => ['Feb', '07'],
                                                            'title' => 'AN APPEAL FOR UNDERSTANDING',
                                                            'hiddenLink' => 'AN APPEAL FOR UNDERSTANDING'
                                                        ],
                                                       
                                                      ],
                                            'right' => [
                                                            [
                                                            'date' => ['JAN', '25'],
                                                            'title' => 'SPECIAL HOLIDAY',
                                                            'hiddenLink' => 'SPECIAL HOLIDAY: JANUARY 25, 2020'
                                                            ],
                                                            [
                                                                'date' => ['Dec', '09'],
                                                                'title' => 'CLASSES AND WORK RESUMPTION',
                                                                'hiddenLink' => 'CLASSES AND WORK RESUMPTION: DECEMBER 9, 2019'
                                                            ],
                                                       ]  
                                        ]
                      ];

        return view('web.home.homepage')->with('homeArrays', $homeArrays);
    }
}
