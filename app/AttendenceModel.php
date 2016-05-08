<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cartalyst\Sentinel\Users\EloquentUser;
use View;
use Validator;
use Input;
use Session;
use Lang;
use URL;
use Request;
use Response;
use Redirect;
class AttendenceModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'attendees';
	public $timestamps = false;
	public function __construct()
    {
        // CSRF Protection
		//$this->facilitiesContact = new FacilityContactModel();
	}
	
	public function getIndex(){
		
		$attendenceData = AttendenceModel::orderby('id', 'DESC')->get();
		
		if(Request::ajax()){
			
			return Response::json(View('attendees.AttendeesList')->with(array("attendees"=>$attendenceData)));
			
		}
		else{
			
			return View('attendees.index')->with(array("attendees"=>$attendenceData));
			
		}
	}
	
	public function addNewFacility(){
		
		$rules = array(
			"FacilityName" => 'required|min:5',
			"FacilityAddress" => 'required',
			"FacilityCity" => 'required',
			"FacilityState" => 'required',
			"FacilityZip" => 'required',
			"FacilityCounty" => 'required',
			"FacilityPhoneNumber" => 'required',
			"FacilityEmail" => 'required|email',
			"FacilityType" => 'required',
			"FacilityParticipateMedicare" => 'required',
			"FacilityNumberOfContacts" => 'required',
		);
		
		$message = array(
			"FacilityName.required" => "Name is required",
			"FacilityName.min" => "Name should be minimum 5 characters long ",
			"FacilityAddress.required" => "Address is required",
			"FacilityCity.required" => "City is required",
			"FacilityState.required" => "State is required",
			"FacilityZip.required" => "Zip is required",
			"FacilityCounty.required" => "County is required",
			"FacilityPhoneNumber.required" => "Phone Number is required",
			"FacilityEmail.required" => "Email Address is required",
			"FacilityEmail.email" => "Email Address is Invalid",
			"FacilityType.required" => "Type is required",
			"FacilityParticipateMedicare.required" => "Did You Participate Medicare?",
			"FacilityNumberOfContacts.required" => 'Number of contacts are required',
		);
		
		$validator = Validator::make(Input::all(), $rules, $message);
		if ($validator->fails()) {
			
			return Response::json(View('facilities/AddForm')->with('input', Input::all())->withErrors($validator)->render());
			
		}
		try {
			
			$facilityId = FacilitiesModel::insertGetId(
				[
					'FacilityName' => Input::get('FacilityName'), 
					'FacilityAddress' => Input::get('FacilityAddress'), 
					'FacilityCity' => Input::get('FacilityCity'), 
					'FacilityState'=> Input::get('FacilityState'),
					'FacilityZip' => Input::get('FacilityZip'),
					'FacilityCounty' => Input::get('FacilityCounty'), 
					'FacilityPhoneNumber' => Input::get('FacilityPhoneNumber'), 
					'FacilityEmail' => Input::get('FacilityEmail'), 
					'FacilityType' => Input::get('FacilityType'),
					'FacilityParticipateMedicare' => Input::get('FacilityParticipateMedicare'), 
					'FacilityNumberOfContacts' => Input::get('FacilityNumberOfContacts'),
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
				]
			);
			
			if (Input::get('FacilityNumberOfContacts')){
				$facilitiesContact = $this->facilitiesContact->addFacilityContact($facilityId);
			}
			
			if ($facilitiesContact){
				
				return 1;
			}
			
			else{
				
				return 0;	
			}
		}
		catch(UserNotFoundException $e){
			
			return 0;	
		}
	}
	
}
