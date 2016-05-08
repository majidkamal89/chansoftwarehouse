<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use View;
use Validator;
use Input;
use Session;
use Lang;
use URL;
use Request;
use Response;
use Redirect;
use App\FacilityContactModel;
use App\ClientsFacilityDetailModel;
use App\ClientsMedicaidDetailModel;
use App\ClientsOfficeUseModel;
use App\ClientsContactModel;
use App\FacilitiesModel;
class ClientsModel extends Model
{
    //
	protected $primaryKey = 'id';
	protected $table = 'clients';
	
	public function __construct()
    {
		$this->ClientsContact = New ClientsContactModel();
		$this->ClientsFacilityDetail = New ClientsFacilityDetailModel();
		$this->ClientsMedicaidDetail = New ClientsMedicaidDetailModel();
		$this->ClientsOfficeUse = New ClientsOfficeUseModel();
		$this->FacilitiesModel = New FacilitiesModel();

	}
	
	public function getIndex(){
			
		$Facilities = FacilitiesModel::all();
		$Users = User::all();
		return View::make('clients.AddClient')->with('Facilities', $Facilities)->with('Users', $Users);
		
	}
	
	public function addNewClient(){
		/**/
		$rules = array(
			"FistName" => 'required|min:4',
			"LastName" => 'required|min:4',
			"DateOfBirth" => 'required',
			"SSNumber" => 'required',
			"Contact1Name" => 'required',
			"Contact1Relation" => 'required',
			"NameOfFacility" => 'required',
			"DailyRate" => 'required',
			"ClientStatus" => 'required',
			"Specialist" => 'required',
			"MedicaidNeeded" => 'required',
			"CaseworkerName" => 'required',
			"IncomeBracket" => 'required',
		);
		$message = array(
			"FistName.required" => "First Name is required",
			"FistName.min" => "First Name should be minimum 4 characters long ",
			"LastName.required" => "Last Name is required",
			"LastName.min" => "Last Name should be minimum 3 characters long",
			"DateOfBirth.required" => "Date Of Birth is required",
			"SSNumber.required" => "Social Security Number is required",
			"Contact1Name.required" => "Contact Name is required",
			"Contact1Relation.required" => "Contact Relation is required",
			"NameOfFacility.required" => "Facility is required",
			"DailyRate.required" => "Daily Rate is required",
			"ClientStatus.required" => "Client Status is required",
			"Specialist.required" => "Specialist is required",
			"MedicaidNeeded.required" => "Medicaid Needed is required",
			"CaseworkerName.required" => "Case worker Name is required",
			"IncomeBracket.required" => "Income Bracket is required",
		);
		
		$validator = Validator::make(Input::all(), $rules, $message);
		$Facilities = FacilitiesModel::all();
		$Users = User::all();
		
		if ($validator->fails()) {
			return View('clients/AddClient')
					->with('input', Input::all())
					->with('Facilities', $Facilities)
					->with('Users', $Users)
					->withErrors($validator)
					->render();
		} else {
			
		
			try {
				
				$ClientId = $this->NewClient();
			
				if( $ClientId > 0 ){
					$this->ClientsContact->addNewClientContacts($ClientId);
				}
			
				if( $ClientId > 0 ){
					$this->ClientsFacilityDetail->addNewClientFacilityDetail($ClientId);
				}
			
				if( $ClientId > 0 ){
					$this->ClientsMedicaidDetail->addNewClientMedicaidDetail($ClientId);
				}
			
				if( $ClientId > 0 ){
					$this->ClientsOfficeUse->addNewClientOfficeUse($ClientId);
				}
			
				//return 1;
				return Redirect::route('dashboard')->with('message', 'New Client Saved Successfully...');
		
			} catch(UserNotFoundException $e) {
				return 2;	
			}
		}
		
	}
	
	public function NewClient(){
		
		$ClientId = ClientsModel::insertGetId([
			'ClientFirstName' => Input::get('FistName'), 
			'ClientInital' => Input::get('Initial'), 
			'ClientLastName' => Input::get('LastName'), 
			'ClientDateOfBirth'=> date('Y-m-d', strtotime(str_replace('/', '-',Input::get('DateOfBirth')))),
			'ClientSocialSecurityNumber' => Input::get('SSNumber'),
			'ClientPreviousAddress2' => Input::get('PreviousAddress1'), 
			'ClientPreviousAddress2' => Input::get('PreviousAddress2'), 
			'ClientPreviousCity' => Input::get('PreviousCity'), 
			'ClientPreviousState' => Input::get('PreviousState'),
			'ClientPreviousZip' => Input::get('PreviousZip'), 
			'ClientAdditionalAddress1' => Input::get('AdditionalAddress1'),
			'ClientAdditionalAddress2' => Input::get('AdditionalAddress2'),
			'ClientAdditionalCity' => Input::get('AdditionalCity'),
			'ClientAdditionalState' => Input::get('AdditionalState'),
			'ClientAdditionalZip' => Input::get('AdditionalZip'),
			'ClientBirthPlace' => Input::get('BirthPlace'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'SpecialistUserId' => Input::get('Specialist'),
			'Facilities_id' => Input::get('NameOfFacility')
		]);
		
		return $ClientId;
	}
	
	public function getClientData($id){
		
		$clientId = base64_decode($id);
		$clientBasicInfo = ClientsModel::with(array('clientsContacts', 'clientFacilityDetail', 'clientsMedicaidDetail', 'user', 'officeUSeModel','facilitiesInfo', 'facilitiesContactInfo'))->where('id',$clientId)->get();
		if(Request::ajax()){
			$Facilities = FacilitiesModel::all();
			$Users = User::all();
			
			return Response::json(View('clients.EditClient')->with(array("clientBasicInfo" => $clientBasicInfo, "Facilities" => $Facilities, "Users" =>$Users))->render());
			
		}
		else{
			
		return View('clients.ViewClient')->with(array("clientBasicInfo" => $clientBasicInfo));
		
		}
		
	}
	
	public function editClientInfo(){
		$updateData = array(
			'ClientFirstName' => Input::get('FistName'), 
			'ClientInital' => Input::get('Initial'), 
			'ClientLastName' => Input::get('LastName'), 
			'ClientDateOfBirth'=> date('Y-m-d', strtotime(str_replace('/', '-',Input::get('DateOfBirth')))),
			'ClientSocialSecurityNumber' => Input::get('SSNumber'),
			'ClientPreviousAddress2' => Input::get('PreviousAddress1'), 
			'ClientPreviousAddress2' => Input::get('PreviousAddress2'), 
			'ClientPreviousCity' => Input::get('PreviousCity'), 
			'ClientPreviousState' => Input::get('PreviousState'),
			'ClientPreviousZip' => Input::get('PreviousZip'), 
			'ClientAdditionalAddress1' => Input::get('AdditionalAddress1'),
			'ClientAdditionalAddress2' => Input::get('AdditionalAddress2'),
			'ClientAdditionalCity' => Input::get('AdditionalCity'),
			'ClientAdditionalState' => Input::get('AdditionalState'),
			'ClientAdditionalZip' => Input::get('AdditionalZip'),
			'ClientBirthPlace' => Input::get('BirthPlace'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'SpecialistUserId' => Input::get('Specialist'), 
			'Facilities_id' => Input::get('NameOfFacility')
			
		);
		ClientsModel::where('id', base64_decode(Input::get('ClientId')))->update($updateData);
		
		if (Input::get('ContactCount')){
			$this->ClientsContact->editClientContacts();
		}
		
		$this->ClientsFacilityDetail->editClientFacilityDetail();
		
		$this->ClientsMedicaidDetail->editClientMedicaidDetail();
		
		$this->ClientsOfficeUse->editClientOfficeUse();
		
		return 1;
	}
	
	public function clientsContacts(){
		
        return $this->hasMany('App\ClientsContactModel', 'Client_id');
    }

    public function clientFacilityDetail(){
		
        return $this->hasOne('App\ClientsFacilityDetailModel', 'Client_id');
    }
	
	public function clientsMedicaidDetail(){
        return $this->hasOne('App\ClientsMedicaidDetailModel', 'Client_id');
    }
	
	public function user(){
        return $this->belongsTo('App\User', 'SpecialistUserId');
    }
	
	public function facilitiesInfo(){
        return $this->belongsTo('App\FacilitiesModel', 'Facilities_id');
    }
	
	public function officeUSeModel(){
		return $this->hasOne('App\ClientsOfficeUseModel','Client_id');	
	}
	
	public function facilitiesContactInfo(){
		return $this->hasMany('App\FacilityContactModel','Facilities_id','Facilities_id');	
	}
	
}
