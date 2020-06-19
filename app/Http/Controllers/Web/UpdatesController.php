<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Services\UpdateService;
use App\Models\Entities\Update;
use MaddHatter\LaravelFullcalendar\Event;

class UpdatesController extends Controller 
{
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
        $events[] = \Calendar::event(
            'Event OneEvent OneEvent OneEvent OneEvent OneEvent OneEvent OneEvent OneEvent OneEvent One', //event title
            false, //full day event?
             new \DateTime('2020-06-14'), //start time (you can also use Carbon instead of DateTime)
             new \DateTime('2020-06-14'), //end time (you can also use Carbon instead of DateTime)
            0, //optionally, you can specify an event ID
            [
                'color' => '#1d17ce'
            ],
        );

        $eloquentEvent = Update::first(); 
        //EventModel implements MaddHatter\LaravelFullcalendar\Event  
        // $calendar = \Calendar::addEvents($events)
        //     ->setOptions([ //set fullcalendar options
        //       'contentHeight' => 'auto',
        //      ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
        //             'viewRender' => 'function( event,element,view ) {
        //                 console.log(element);

        //             }'
        //         ]);
        
        $calendar = \Calendar::addEvents($events)->setOptions(['firstDay' => 1])->setCallbacks(['eventRender' => 'function (event,jqEvent,view) {jqEvent.tooltip({placement: "top", title: event.title});}']);

        return view('web.updates.calendar')->with('calendar', $calendar);
    
   }

    private function getPaginator(Request $request, $items) 
    {
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

    public function getUpdateLatestData()
    {
        // $html = view('web.layouts.latest-post')->with([
        //                                             'latestPosts' => $this->updateService->updateLatestData(),
        //                                             'upcomingEvents' => [],
        //                                         ])->render();

         return response()->json([
                                'latestPosts' => $this->updateService->updateLatestData(),
                                'upcomingEvents' => [],
                            ]);
    }
}
