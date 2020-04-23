<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

  public function getEvaluate() {
    return view('web.about-us.evaluate');
  }

   public function getHistory() {
   	return view('web.about-us.history');
   }

   public function getAdministrators() {
   	return view('web.about-us.administrators');
   }

    public function getAwardsAndRecognition() {
   	 return view('web.about-us.awards-and-recognition');
   }

   public function getFacilities() {
   	 return view('web.about-us.facilities');
   }

    public function getMissionVisionGoal() {
   	 return view('web.about-us.mission-vision-goal');
   }

    public function getOrganizationalStructure() {
   	 return view('web.about-us.organizational-structure');
   }

    public function getStArnoldsPrayer() {
   	 return view('web.about-us.st-arnolds-prayer');
   }

    public function getTheHymn() {
   	 return view('web.about-us.the-hymn');
   }

    public function getTheJingle() {
   	 return view('web.about-us.the-jingle');
   } 

    public function getTheSeal() {
   	 return view('web.about-us.the-seal');
   }
}
