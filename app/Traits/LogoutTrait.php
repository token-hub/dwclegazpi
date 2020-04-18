<?php
namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogTrait;

trait LogoutTrait
{
	use LogTrait;

    public function postLogout() {   	
    	$this->log('out');
    	Auth::logout();

    	return redirect('dashboard/login');
    }
}