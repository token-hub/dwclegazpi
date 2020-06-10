<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services\SlideService;
use App\Models\Services\UpdateService;

class HomeController extends Controller
{
    protected $slideService;
    protected $updateService;

    public function __construct(SlideService $slideService, UpdateService $updateService)
    {
        $this->slideService = $slideService;
        $this->updateService = $updateService;
    }

    public function getIndex()
    {
        $homeArrays = [
                        // 'newsAndEvents' => [
                        //                         [
                        //                             'title' => '59th FOUNDATION ANNIVERSARY',
                        //                             'image' => 'foundation_2020_home.jpg'
                        //                         ],
                        //                         [
                        //                             'title' => 'THE NEW NORTH CAMPUS MAIN GATE',
                        //                             'image' => 'gate.jpg'
                        //                         ],
                        //                         [
                        //                             'title' => 'NIGHT HIGH CLASS BATCH \'78 REUNION',
                        //                             'image' => 'alumni.png'
                        //                         ]
                        //                    ],

                        'newsAndEvents' => $this->updateService->getNewsAndEventsLimit(3),         
                        'announcements' => $this->updateService->getAnnouncementChunkTwo(),
                        'active_slides' => $this->slideService->active(),
                      ];
                      
        return view('web.home.homepage')->with('home', $homeArrays);
    }
}
