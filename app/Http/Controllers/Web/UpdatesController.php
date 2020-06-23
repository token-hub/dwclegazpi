<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services\UpdateService;
use App\Models\Entities\Update;
use MaddHatter\LaravelFullcalendar\Event;
use App\Traits\PaginatorTrait;

class UpdatesController extends Controller 
{
    use PaginatorTrait;

	public $updateService;

	public function __construct(updateService $updateService)
	{
		$this->updateService = $updateService;
	}

   public function getIndex(Request $request) 
   {
   		$updates = $this->updateService->getAll()->toArray();

   		$paginator = $this->getPaginator($request, $updates);

   		return view('web.updates.updates')->with('updates', $paginator);
   }

   public function getAnnouncementOverview(Request $request)
   {
   		$announcements = $this->updateService->getAllAnnouncement()->toArray();

   		$paginator = $this->getPaginator($request, $announcements);

   		return view('web.updates.announcement-overview')->with('announcements', $paginator);
   }

   public function getAnnouncementArticles() 
   {
   		$announcements = $this->updateService->getAllAnnouncement()->toArray();

   		return view('web.updates.announcement-articles')->with('announcements', $announcements);
   }

   public function getNewsAndEventsOverview(Request $request)
   {
   		$newsAndEvents = $this->updateService->getAllNewsAndEvents()->toArray();

   		$paginator = $this->getPaginator($request, $newsAndEvents);

   		return view('web.updates.news-and-events-overview')->with('newsAndEvents', $paginator);
   }

    public function getNewsAndEventsArticles() 
    {
   		$newsAndEvents = $this->updateService->getAllNewsAndEvents()->toArray();

   		return view('web.updates.news-and-events-articles')->with('newsAndEvents', $newsAndEvents);
   }

   public function getCalendar()
   {
        // $eloquentEvent = Update::first(); 

        $updates = $this->updateService->getAllNewsAndEvents()->toArray();

        foreach ($updates as $key => $update) {
           $events[] = \Calendar::event(  
                $update['title'],
                false,
                $update['start_date'],
                $update['end_date'],
                0,
                [
                'color' => '#1d17ce',
            ],
           );
        }
        
        $calendar = \Calendar::addEvents($events)
                ->setOptions([ 'contentHeight' => 'auto',])
                ->setCallbacks(['eventClick' => 'function( calEvent, jsEvent, view ) { alert("Event : " + calEvent.title); }' ]);

        return view('web.updates.calendar')->with('calendar', $calendar);
    
   }

    public function getUpdateLatestData()
    {
         return response()->json([
                                'latestPosts' => $this->updateService->updateLatestPostsData(),
                                'upcomingEvents' => $this->updateService->updateUpcomingEventsData(),
                            ]);
    }
}
