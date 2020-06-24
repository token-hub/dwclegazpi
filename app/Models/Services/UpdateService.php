<?php 

namespace App\Models\Services;

use App\Models\Repositories\UpdateInterface;
use App\Models\Entities\Update;
use yajra\Datatables\Datatables;

class UpdateService  
{
	public $updateInterface;

	public function __construct(UpdateInterface $updateInterface)
	{
		$this->updateInterface = $updateInterface;
	}

	public function store($data)
	{
		$this->updateInterface->store($data);

		return ['type' => 'notif-success', 'message' => 'New update added!'];
	}

	public function update($update ,$data)
	{
		$this->updateInterface->update($update, $data);

		return ['type' => 'notif-success', 'message' => 'Successfully updated!'];
	}

	public function destroy($update)
	{
		$this->updateInterface->destroy($update);

		\Session::flash('notification', ['type' => 'notif-success', 'message' => 'Update deleted successfully!']);
	}

	public function getAll()
	{
		return $this->updateInterface->getAll();
	}

	public function getAllAnnouncement()
	{
		return $this->updateInterface->getAllAnnouncement();
	}

	public function getAnnouncementChunkTwo()
	{
		return $this->updateInterface->getAnnouncementChunkTwo();
	}

	public function getAllNewsAndEvents()
	{
		return $this->updateInterface->getAllNewsAndEvents();
	}

	public function getNewsAndEventsLimit($num)
	{
		return $this->updateInterface->getNewsAndEventsLimit($num);
	}

	public function getUpdateOrigin($update)
	{
		return $this->updateInterface->getUpdateOrigin($update);
	}

	public function updateLatestPostsData()
	{
		return $this->updateInterface->updateLatestPostsData();
	}

	public function updateUpcomingEventsData()
	{
		return $this->updateInterface->updateUpcomingEventsData();
	}

	public function updateData($data)
	{
		$updates = $this->updateInterface->getAll();

        return Datatables::of($updates)
        	->editColumn('date', function ($update) {
        		return date("F d, Y | h:i A", strtotime($update->created_at));

        	})
        	->addColumn('user', function ($update) {
        		return  ucfirst($update->user->username);
        	})
            ->addColumn('action', function ($update) use ($data) {
            	if(!empty($data)) {
            		$action = '';

            		if (in_array('update', $data)){
            		$action .= "<a href='/dashboard/updates/". $update->id . "/edit'> <button style='width:100%;margin:2px 0;' class='btn btn-sm btn-info '> Edit </button> </a>";
	            	}

	            	if (in_array('delete', $data)){
	            		$action .= "<button value='".$update->id."' style='width:100%;' class='btn btn-sm btn-danger delete_update'> Delete </button>";
	            	}

	            	return $action;
            	}
            	
            	return 'N/A';
            })
            ->make(true);
	}
}