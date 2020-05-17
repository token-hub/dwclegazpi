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

	public function logsData($data)
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
	     ->addColumn('username', function ($logs) use ($data) {
	     	
	     	$username = ucfirst(User::find($logs->causer_id)->username);

	     	if (!empty($data))
	     	{	
 				return "<a href='logs/".$logs->causer_id."/date/".$logs->created_at."' style='text-decoration:none;'>". $username ."</a>";
	     	}
	     	
	          return  $username;
	     })
	    ->rawColumns(['username'])
	    ->make(true);
	}

	public function show($id, $date)
	{
		$logs = $this->logInterface->getByCauserIdAndDate($id, $date);

		$properties = $logs->filter(function($item){
					return count($item->properties) != 0;
				})
				->map(function($item){
					if (array_key_exists("old",$item->properties->toArray())  ) {
						$arr = array('old' => $item->properties['old'], 'new' => $item->properties['attributes']);
					} else {
						$arr = array('new' => $item->properties['attributes']);
					}
					return $arr;
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