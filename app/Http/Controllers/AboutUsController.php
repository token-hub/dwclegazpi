<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{

  public function getEvaluate() {
    return view('AboutUsPage.evaluate');
  }

   public function getHistory() {
   	return view('AboutUsPage.history');
   }

   public function getAdministrators() {
   	return view('AboutUsPage.administrators');
   }

    public function getAwardsAndRecognition() {
   	 return view('AboutUsPage.awardsAndRecognition');
   }

   public function getFacilities() {
   	 return view('AboutUsPage.facilities');
   }

    public function getMissionVisionGoal() {
   	 return view('AboutUsPage.missionVisionGoal');
   }

    public function getOrganizationalStructure() {
   	 return view('AboutUsPage.organizationalStructure');
   }

    public function getStArnoldsPrayer() {
   	 return view('AboutUsPage.stArnoldsPrayer');
   }

    public function getTheHymn() {
   	 return view('AboutUsPage.theHymn');
   }

    public function getTheJingle() {
   	 return view('AboutUsPage.theJingle');
   } 

    public function getTheSeal() {
   	 return view('AboutUsPage.theSeal');
   }
}
