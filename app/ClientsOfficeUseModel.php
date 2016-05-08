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

class ClientsOfficeUseModel extends Model
{
    //
	protected $primaryKey = 'id';
	protected $table = 'clientofficeuse';
	public $timestamps = false;
	
	public function addNewClientOfficeUse($ClientId){
		
		$ClientMedicaid = ClientsOfficeUseModel::insertGetId([
			'ClientOfficeUseStatus' => Input::get('ClientStatus'), 
			'Client_id' => $ClientId
		]);
	}
	
	public function editClientOfficeUse(){
		
		ClientsOfficeUseModel::where('id', base64_decode(Input::get('OfficeUSeId')))->update([
			'ClientOfficeUseStatus' => Input::get('ClientStatus'), 
		]);
	}
}
