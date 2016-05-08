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

class ClientsMedicaidDetailModel extends Model
{
    //
	protected $primaryKey = 'id';
	protected $table = 'clientmedicaiddetails';
	public $timestamps = false;
	
	public function addNewClientMedicaidDetail($ClientId){
		
		 $ClientMedicaid = ClientsMedicaidDetailModel::insertGetId([
			  'ClientMedicaidDetailsNeedDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('MedicaidNeeded')))), 
			  'ClientMedicaidDetailsCaseWorkerName' => Input::get('CaseworkerName'),
			  'ClientMedicaidDetailsIncomBracket' => Input::get('IncomeBracket'), 
			  'ClientMedicaidDetailsCounty'=> Input::get('County'),
			  'ClientMedicaidDetailsQitEstablishedDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('QITEstablished')))),
			  'ClientMedicaidDetailsSubmissionDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('SubmissionDate')))), 
			  'ClientMedicaidDetailsApprovalDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('ApprovalDate')))),
			  'Client_id' => $ClientId
		]);
	}
	
	public function editClientMedicaidDetail(){
		ClientsMedicaidDetailModel::where('id', base64_decode(Input::get('MedicaidDetailsId')))->update([
			  'ClientMedicaidDetailsNeedDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('MedicaidNeeded')))), 
			  'ClientMedicaidDetailsCaseWorkerName' => Input::get('CaseworkerName'),
			  'ClientMedicaidDetailsIncomBracket' => Input::get('IncomeBracket'), 
			  'ClientMedicaidDetailsCounty'=> Input::get('County'),
			  'ClientMedicaidDetailsQitEstablishedDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('QITEstablished')))),
			  'ClientMedicaidDetailsSubmissionDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('SubmissionDate')))), 
			  'ClientMedicaidDetailsApprovalDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('ApprovalDate')))),
		]);	
	}
	
}
