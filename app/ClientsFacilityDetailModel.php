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

class ClientsFacilityDetailModel extends Model
{
    //
	protected $primaryKey = 'id';
	protected $table = 'clientfacilitydetail';
	public $timestamps = false;
	
	public function addNewClientFacilityDetail($ClientId){
		
		$ClientFacility = ClientsFacilityDetailModel::insertGetId([
			'ClientFacilityRate' => Input::get('DailyRate'), 
			'ClientFacilityOutStandingBill' => Input::get('OutstandingBill'), 
			'ClientFacilityLastPayStatus' => Input::get('LastPayment'), 
			'ClientFacilityLastPayDate'=> date("Y-m-d", strtotime(str_replace('/', '-',Input::get('LastPaymentDate')))),
			'ClientFacilityMedicareBenifitsStartDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('MedicareBenifitsStartDate')))), 
			'ClientFacilityMedicareEndDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('MedicareEndDate')))), 
			'ClientFacilitySecurityDepositeStatus' => Input::get('SecurityDepositeStatus'), 
			'ClientFacilitySecurityDeposite' => Input::get('SecurityDeposite'),
			'ClientFacilityPnaStatus' => Input::get('PnaStatus'),
			'ClientFacilityPna' => Input::get('Pna'),
			'ClientFacilityMocSsiBenefits' => Input::get('MocSsiBenefits'),
			'ClientFacilityBillPaid' => Input::get('BillPaid'),
			'ClientFacilityPassRequestDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('PASRequest')))),
			'ClientFacilityPassReceivedDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('PASReceive')))), 
			'Client_id' => $ClientId
		]);
	}
	
	public function editClientFacilityDetail(){
		ClientsFacilityDetailModel::where('id', base64_decode(Input::get('FacilityDetailId')))->update([
			'ClientFacilityRate' => Input::get('DailyRate'), 
			'ClientFacilityOutStandingBill' => Input::get('OutstandingBill'), 
			'ClientFacilityLastPayStatus' => Input::get('LastPayment'), 
			'ClientFacilityLastPayDate'=> date("Y-m-d", strtotime(str_replace('/', '-',Input::get('LastPaymentDate')))),
			'ClientFacilityMedicareBenifitsStartDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('MedicareBenifitsStartDate')))), 
			'ClientFacilityMedicareEndDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('MedicareEndDate')))), 
			'ClientFacilitySecurityDepositeStatus' => Input::get('SecurityDepositeStatus'), 
			'ClientFacilitySecurityDeposite' => Input::get('SecurityDeposite'),
			'ClientFacilityPnaStatus' => Input::get('PnaStatus'),
			'ClientFacilityPna' => Input::get('Pna'),
			'ClientFacilityMocSsiBenefits' => Input::get('MocSsiBenefits'),
			'ClientFacilityBillPaid' => Input::get('BillPaid'),
			'ClientFacilityPassRequestDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('PASRequest')))),
			'ClientFacilityPassReceivedDate' => date("Y-m-d", strtotime(str_replace('/', '-',Input::get('PASReceive')))), 
		]);	
	}
}
