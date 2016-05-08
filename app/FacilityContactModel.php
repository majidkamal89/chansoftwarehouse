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

class FacilityContactModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'facilitycontact';
	public $timestamps = false;
	
	public function addFacilityContact($facilityId){
		
		for($i=1; $i<=Input::get('FacilityNumberOfContacts');$i++){
			FacilityContactModel::insert(
				[
					"FacilityContactName" => Input::get('FacilityContactName'.$i.''),
					"FacilityContactTitle" => Input::get('FacilityContactTitle'.$i.''),
					"FacilityContactPhone" => Input::get('FacilityContactPhone'.$i.''),
					"FacilityContactEmail" => Input::get('FacilityContactEmail'.$i.''),
					"Facilities_id" => $facilityId
				]
			);	
		}
		return 1;
	}
}
