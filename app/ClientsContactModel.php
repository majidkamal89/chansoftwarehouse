<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use View;
use Validator;
use Input;
use Session;
use Lang;
use URL;
use Request;
use Response;
use Redirect;

class ClientsContactModel extends Model
{
    //
	protected $primaryKey = 'id';
	protected $table = 'clientcontacts';
	public $timestamps = false;
	
	public function addNewClientContacts($ClientId){
		
		for($i=1; $i<3; $i++){
			
			$ClientContacts = ClientsContactModel::insertGetId([
				'ClientContactName' => Input::get('Contact'.$i.'Name'), 
				'ClientContactRelation' => Input::get('Contact'.$i.'Relation'), 
				'ClientContactMainContact' => Input::get('Contact'.$i.'Main'), 
				'ClientContactPoa'=> Input::get('Contact'.$i.'POA'),
				'ClientContactAddress1' => Input::get('Contact'.$i.'Address1'), 
				'ClientContactAddress2' => Input::get('Contact'.$i.'Address2'), 
				'ClientContactCity' => Input::get('Contact'.$i.'City'), 
				'ClientContactState' => Input::get('Contact'.$i.'State'),
				'ClientContactZip' => Input::get('Contact'.$i.'Zip'),
				'ClientContactHomePhone' => Input::get('Contact'.$i.'HomePhone'),
				'ClientContactEmail' => Input::get('Contact'.$i.'Email'),
				'ClientContactMobile' => Input::get('Contact'.$i.'Mobile'), 
				'Client_id' => $ClientId
			]);
		
		}
	}
	
	public function editClientContacts(){
		for ($i=1; $i<=Input::get('ContactCount'); $i++){
			ClientsContactModel::where('id',base64_decode(Input::get('ClientContactId'.$i)))->update([
				'ClientContactName' => Input::get('Contact'.$i.'Name'), 
				'ClientContactRelation' => Input::get('Contact'.$i.'Relation'), 
				'ClientContactMainContact' => Input::get('Contact'.$i.'Main'), 
				'ClientContactPoa'=> Input::get('Contact'.$i.'POA'),
				'ClientContactAddress1' => Input::get('Contact'.$i.'Address1'), 
				'ClientContactAddress2' => Input::get('Contact'.$i.'Address2'), 
				'ClientContactCity' => Input::get('Contact'.$i.'City'), 
				'ClientContactState' => Input::get('Contact'.$i.'State'),
				'ClientContactZip' => Input::get('Contact'.$i.'Zip'),
				'ClientContactHomePhone' => Input::get('Contact'.$i.'HomePhone'),
				'ClientContactEmail' => Input::get('Contact'.$i.'Email'),
				'ClientContactMobile' => Input::get('Contact'.$i.'Mobile'), 
			]);
		}
	}
	
}
