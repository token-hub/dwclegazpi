<?php 

namespace App\Models\Services;

use App\Models\Repositories\LogInterface;
use yajra\Datatables\Datatables;
use App\Models\Entities\User;

class LogService 
{
	protected $logInterface;

	public function __construct(LogInterface $logInterface)
	{
		$this->logInterface = $logInterface;
	}

	public function index()
	{
		$logs = $this->logInterface->getWhereCauserIdNotNull();

		return Datatables::Of($logs)
	    ->editColumn('description', function ($logs) {
	        return  strpos($logs->log_name, 'Log') == true 
	            ? 'A user '.$logs->description 
	            : 'A '.$logs->log_name.' '.$logs->description;
	     })
	    ->addColumn('timeAndDate', function ($logs) {
	          return date("F d, Y | h:i A", strtotime($logs->created_at));
	     })
	     ->addColumn('username', function ($logs) {
	          return  ucfirst(User::find($logs->causer_id)->username);
	     })
	    ->make(true);
	}

	public function show($id, $date)
	{
		$logs = $this->logInterface->getByCauserIdAndDate($id, $date);

		$properties = $logs->filter(function($item){
					return count($item->properties) != 0;
				})->map(function($item){
					return array('old' => $item->properties['old'], 'new' => $item->properties['attributes']);
				})->toArray();

		# object to array
        $logs = $logs->toArray();

        # get only the first log data
        $log = array_shift($logs);

        return array_merge($log,
        	[
        		'properties' => $properties,
        	 	'subject_username' => User::find($log['causer_id'])['username']
        	]);
	}
}