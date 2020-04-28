<?php 

namespace App\Models\Repositories\Eloquent;

use App\Models\Repositories\LogInterface;
use Spatie\Activitylog\Models\Activity;

class LogRepository implements LogInterface 
{
	public function getWhereCauserIdNotNull() 
	{
		return Activity::whereNotNull('causer_id')
		        ->groupBy('created_at')
		        ->orderBy('id')
		        ->get();
	}

	public function getByCauserIdAndDate($id, $date)
	{
		return Activity::where('Activity_log.causer_id', $id)
	        	->where('Activity_log.created_at', $date)
	            ->leftJoin('users', 'users.id', '=', 'causer_id')
	            ->get(['*', 'Activity_log.created_at']);
	}
}