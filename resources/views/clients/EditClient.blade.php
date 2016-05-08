<div class="row alert" style="display:none;" id="StatusMessages"></div>
<div class="row">
  <div class="col-md-4 pd-col-4">
    <h3>Client Information</h3>
  </div>
</div>
<form method="post" id="editClient" name="editClient">
  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
  <input type="hidden" name="ClientId" value="{!! base64_encode($clientBasicInfo[0]->id) !!}"  />
  <div class="row">
    <div style="display: block;" class="col-md-5 display-no">
      <div style="position: static;" class="form-group {{ $errors->first('FistName', 'has-error') }}">
        <label for="input-text-1">First Name</label>
        <input class="form-control" id="FistName" name="FistName" placeholder="Enter First Name" type="text" value="{!! $clientBasicInfo[0]->ClientFirstName !!}">
        <div class="col-sm-11"> {!! $errors->first('FistName', '<span style="color:red;">:message</span>') !!} </div>
      </div>
    </div>
    <div style="display: block;" class="col-md-2 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-1">Initial</label>
        <input class="form-control" value="{!! $clientBasicInfo[0]->ClientInital !!}" id="Initial" name="Initial" placeholder="Enter Initial" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-5 display-no">
      <div style="position: static;" class="form-group {{ $errors->first('LastName', 'has-error') }}">
        <label for="input-text-2">Last Name</label>
        <input class="form-control" id="LastName" name="LastName" placeholder="Enter Last Name" value="{!! $clientBasicInfo[0]->ClientLastName !!}" type="text">
        <div class="col-sm-11"> {!! $errors->first('LastName', '<span style="color:red;">:message</span>') !!} </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-6 display-no">
      <div style="position: static;" class="form-group {{ $errors->first('DateOfBirth', 'has-error') }} ">
        <label for="input-text-1">Date Of Birth</label>
        <div class="input-group">
          <input type="text" placeholder="--/--/----" class="form-control datepicker" id="DateOfBirth" name="DateOfBirth" value="{!! date("d/m/Y", strtotime($clientBasicInfo[0]->ClientDateOfBirth)) !!}">
          <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
        <div class="col-sm-11"> {!! $errors->first('DateOfBirth', '<span style="color:red;">:message</span>') !!} </div>
      </div>
    </div>
    <div style="display: block;" class="col-md-6 display-no">
      <div style="position: static;" class="form-group {{ $errors->first('SSNumber', 'has-error') }}">
        <label for="input-text-2">Social Security Number</label>
        <input class="form-control" id="SSNumber" name="SSNumber" value="{!! $clientBasicInfo[0]->ClientSocialSecurityNumber !!}" placeholder="Enter Soical Security Number" type="text">
        <div class="col-sm-11"> {!! $errors->first('SSNumber', '<span style="color:red;">:message</span>') !!} </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-3 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-1">Previous Address</label>
        <input class="form-control" id="PreviousAddress1" value="{!! $clientBasicInfo[0]->ClientPreviousAddress1 !!}" name="PreviousAddress1" placeholder="Address 1" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-3 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-2">&nbsp;</label>
        <input class="form-control" id="PreviousAddress2" value="{!! $clientBasicInfo[0]->ClientPreviousAddress2 !!}" name="PreviousAddress2" placeholder="Address 2" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-2 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-2">&nbsp;</label>
        <input class="form-control" id="PreviousCity" value="{!! $clientBasicInfo[0]->ClientPreviousCity !!}" name="PreviousCity" placeholder="City" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-2">
      <div style="position: static;" class="form-group">
        <label for="select-1">&nbsp;</label>
        <select class="form-control" id="PreviousState" name="PreviousState">
          <option value="">State</option>
          <option {!! $clientBasicInfo[0]->ClientPreviousState=='Alabama' ? "selected" : "" !!} value="Alabama">Alabama</option>
          <option {!! $clientBasicInfo[0]->ClientPreviousState=='NewYork' ? "selected" : "" !!} value="NewYork">NewYork</option>
        </select>
      </div>
    </div>
    <div style="display: block;" class="col-md-2 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-2">&nbsp;</label>
        <input class="form-control" id="PreviousZip" value="{!! $clientBasicInfo[0]->ClientPreviousZip !!}" name="PreviousZip" placeholder="Zip" type="text">
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-3 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-1">Additional Address</label>
        <input class="form-control" id="AdditionalAddress1" value="{!! $clientBasicInfo[0]->ClientAdditionalAddress1 !!}" name="AdditionalAddress1" placeholder="Address 1" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-3 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-2">&nbsp;</label>
        <input class="form-control" id="AdditionalAddress2" value="{!! $clientBasicInfo[0]->ClientAdditionalAddress2 !!}" name="AdditionalAddress2" placeholder="Address 2" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-2 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-2">&nbsp;</label>
        <input class="form-control" id="AdditionalCity" value="{!! $clientBasicInfo[0]->ClientAdditionalCity !!}" name="AdditionalCity" placeholder="City" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-2">
      <div style="position: static;" class="form-group">
        <label for="select-1">&nbsp;</label>
        <select class="form-control" id="AdditionalState" name="AdditionalState">
          <option value="">State</option>
           <option {!! $clientBasicInfo[0]->ClientAdditionalState=='Alabama' ? "selected" : "" !!} value="Alabama">Alabama</option>
          <option {!! $clientBasicInfo[0]->ClientAdditionalState=='NewYork' ? "selected" : "" !!} value="NewYork">NewYork</option>
        </select>
      </div>
    </div>
    <div style="display: block;" class="col-md-2 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-2">&nbsp;</label>
        <input class="form-control" value="{!! $clientBasicInfo[0]->ClientAdditionalZip !!}" id="AdditionalZip" name="AdditionalZip" placeholder="Zip" type="text">
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-6 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-1">Birth Place</label>
        <input class="form-control"  id="BirthPlace" value="{!! $clientBasicInfo[0]->ClientBirthPlace !!}" name="BirthPlace" placeholder="Enter Birth Place" type="text">
      </div>
    </div>
  </div>
  @if(count($clientBasicInfo[0]->clientsContacts) > 0)
  {{--*/
    $count = 1;
    /*--}}
    @foreach($clientBasicInfo[0]->clientsContacts as $contactData)
  <div class="row">
  <input type="hidden" name="ContactCount" value="{!! count($clientBasicInfo[0]->clientsContacts) !!}" />
    <div style="display: block;" class="col-md-4 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-1">Contact Name {!! $count !!}</label>
        <input class="form-control" id="Contact{!! $count !!}Name" value="{!! $contactData->ClientContactName !!}" name="Contact{!! $count !!}Name" placeholder="Contact Name {!! $count !!}" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-2">
      <div style="position: static;" class="form-group">
        <label for="select-1">Relationship</label>
        <input class="form-control" id="Contact{!! $count !!}Relation" value="{!! $contactData->ClientContactRelation !!}" name="Contact{!! $count !!}Relation" placeholder="Relationship" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-3">
      <label for="input-text-1">&nbsp;</label>
      <div style="position: static;" class="checkbox">
        <label>
          <input type="checkbox" value="1" id="Contact{!! $count !!}Main" {{ $contactData->
                        ClientContactMainContact==1 ? 'checked' : '' }} name="Contact{!! $count !!}Main">
          <span>Main Contact</span> </label>
      </div>
    </div>
    <div style="display: block;" class="col-md-3">
      <label for="input-text-1">&nbsp;</label>
      <div style="position: static;" class="checkbox">
        <label>
          <input type="checkbox" value="1" {{ $contactData->
                        ClientContactPoa==1 ? 'checked' : '' }} id="Contact{!! $count !!}POA" name="Contact{!! $count !!}POA">
          <span>POA</span> </label>
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-3 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-1">Contact Address</label>
        <input class="form-control" id="Contact{!! $count !!}Address1" value="{!! $contactData->ClientContactAddress1 !!}" name="Contact{!! $count !!}Address1" placeholder="Address {!! $count !!}" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-3 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-2">&nbsp;</label>
        <input class="form-control" id="Contact{!! $count !!}Address2" value="{!! $contactData->ClientContactAddress2 !!}" name="Contact{!! $count !!}Address2" placeholder="Address 2" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-2 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-2">&nbsp;</label>
        <input class="form-control" id="Contact{!! $count !!}City" value="{!! $contactData->ClientContactCity !!}" name="Contact{!! $count !!}City" placeholder="City" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-2">
      <div style="position: static;" class="form-group">
        <label for="select-1">&nbsp;</label>
        <select class="form-control" id="Contact{!! $count !!}State" name="Contact{!! $count !!}State">
          <option value="">State</option>
          <option {!! $contactData->ClientContactState=='Alabama' ? "selected" : "" !!} value="Alabama">Alabama</option>
          <option {!! $contactData->ClientContactState=='NewYork' ? "selected" : "" !!} value="NewYork">NewYork</option>
        </select>
      </div>
    </div>
    <div style="display: block;" class="col-md-2 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-2">&nbsp;</label>
        <input class="form-control" id="Contact{!! $count !!}Zip" value="{!! $contactData->ClientContactZip !!}" name="Contact{!! $count !!}Zip" placeholder="Zip" type="text">
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-4 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-1">Home Phone</label>
        <input class="form-control" id="Contact{!! $count !!}HomePhone" value="{!! $contactData->ClientContactHomePhone !!}" name="Contact{!! $count !!}HomePhone" placeholder="Home Phone" type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-4 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-1">Email</label>
        <input class="form-control" id="Contact{!! $count !!}Email" value="{!! $contactData->ClientContactEmail !!}"  name="Contact{!! $count !!}Email" placeholder="Email" type="email">
      </div>
    </div>
    <div style="display: block;" class="col-md-4 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-2">Mobile</label>
        <input class="form-control" id="Contact{!! $count !!}Mobile" value="{!! $contactData->ClientContactMobile !!}" name="Contact{!! $count !!}Mobile" placeholder="Mobile" type="text">
      </div>
    </div>
  </div>
  	<input type="hidden" name="ClientContactId{!! $count !!}" value="{!! base64_encode($contactData->id) !!}" />
    {{--*/
    $count++;
    /*--}}
  @endforeach
  @endif
  <div class="row">
    <div class="col-md-4 pd-col-4">
      <h3>Facility Information</h3>
    </div>
  </div>
  <div class="row">
  <input type="hidden" name="FacilityDetailId" value="{!! base64_encode($clientBasicInfo[0]->clientFacilityDetail->id) !!}" />
    <div style="display: block;" class="col-md-4">
      <div style="position: static;" class="form-group {{ $errors->first('NameOfFacility', 'has-error') }}">
        <label for="select-1">Name of Facility</label>
        <select class="form-control" id="NameOfFacility" name="NameOfFacility">
          	@if(count($Facilities) > 0)
          <option value="">Select Facility</option>
            @foreach($Facilities as $Facility)
          <option {!! $clientBasicInfo[0]->Facilities_id==$Facility->id ? "selected" : "" !!} value="{!! $Facility->id !!}">{!! $Facility->FacilityName !!}</option>
            @endforeach
            @else
          <option value="">No Facities Found</option>
            @endif
        </select>
        <div class="col-sm-11"> {!! $errors->first('NameOfFacility', '<span style="color:red;">:message</span>') !!} </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-3 display-no">
      <div style="position: static;" class="form-group {{ $errors->first('DailyRate', 'has-error') }}">
        <label for="input-text-1">Daily Rate</label>
        <input class="form-control" id="DailyRate" name="DailyRate" value="{!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityRate !!}" placeholder="Daily Rate" type="text">
        <div class="col-sm-11"> {!! $errors->first('DailyRate', '<span style="color:red;">:message</span>') !!} </div>
      </div>
    </div>
    <div style="display: block;" class="col-md-3">
      <label for="select-1">&nbsp;</label>
      <div style="position: static;" class="checkbox">
        <label>
          <input type="checkbox" value="1" {!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityOutStandingBill==1 ? "checked" : "" !!} id="OutstandingBill" name="OutstandingBill">
          <span>Outstanding Bill</span> </label>
      </div>
    </div>
    <div style="display: block;" class="col-md-3">
      <label for="select-1">&nbsp;</label>
      <div style="position: static;" class="checkbox">
        <label>
          <input type="checkbox" {!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityLastPayStatus==1 ? "checked" : "" !!} value="1" id="LastPayment" name="LastPayment">
          <span>Last Payment Date</span> </label>
      </div>
    </div>
    <div style="display: block;" class="col-md-3 display-no">
      <div style="position: static;" class="form-group ">
        <label for="input-text-1">&nbsp;</label>
        <div class="input-group">
          <input type="text" placeholder="--/--/----" value="{!! date("d/m/Y", strtotime($clientBasicInfo[0]->clientFacilityDetail->ClientFacilityLastPayDate)) !!}" class="form-control datepicker" id="LastPaymentDate" {!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityLastPayStatus==1 ? "" : "disabled" !!} name="LastPaymentDate">
          <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-2 display-no">
      <div style="position: static;" class="form-group ">
        <label for="input-text-1">Started Using Medicare benefits</label>
        <div class="input-group">
          <input type="text" placeholder="--/--/----" value="{!! date("d/m/Y", strtotime($clientBasicInfo[0]->clientFacilityDetail->ClientFacilityMedicareBenifitsStartDate)) !!}" class="form-control datepicker" id="MedicareBenifitsStartDate" name="MedicareBenifitsStartDate">
          <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
      </div>
    </div>
    <div style="display: block;" class="col-md-2 display-no">
      <div style="position: static;" class="form-group ">
        <label for="input-text-1">Medicare end <br/>
          date</label>
        <div class="input-group">
          <input type="text" placeholder="--/--/----" value="{!! date("d/m/Y", strtotime($clientBasicInfo[0]->clientFacilityDetail->ClientFacilityMedicareEndDate)) !!}" class="form-control datepicker" id="MedicareEndDate" name="MedicareEndDate">
          <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
      </div>
    </div>
    <div style="display: block;" class="col-md-2">
      <label for="select-1">&nbsp;</label>
      <div style="position: static;" class="checkbox">
        <label>
          <input type="checkbox" {!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilitySecurityDepositeStatus==1 ? "checked" : "" !!} value="1" id="SecurityDepositeStatus" name="SecurityDepositeStatus">
          <span>Security Deposit</span> </label>
      </div>
    </div>
    <div style="display: block;" class="col-md-2 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-1">&nbsp;</label>
        <br/>
        <input class="form-control" id="SecurityDeposite" value="{!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilitySecurityDeposite !!}" name="SecurityDeposite" placeholder="Security Deposit" {!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilitySecurityDepositeStatus==1 ? "" : "disabled" !!} type="text">
      </div>
    </div>
    <div style="display: block;" class="col-md-2">
      <label for="select-1">&nbsp;</label>
      <div style="position: static;" class="checkbox">
        <label>
          <input type="checkbox" value="1" {!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityPnaStatus==1 ? "checked" : "" !!} id="PnaStatus" name="PnaStatus">
          <span>PNA</span> </label>
      </div>
    </div>
    <div style="display: block;" class="col-md-2 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-1">&nbsp;</label>
        <input class="form-control" name="Pna" id="Pna" value="{!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityPna !!}"  {!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityPnaStatus==1 ? "" : "disabled" !!} placeholder="PNA" type="text">
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-3">
      <label for="input-text-1">&nbsp;</label>
      <div style="position: static;" class="checkbox">
        <label>
          <input type="checkbox" {!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityMocSsiBenefits==1 ? "checked" : "" !!} id="MocSsiBenefits" name="MocSsiBenefits">
          <span>Enrolled in MCO or receiving SSI Benefits?</span> </label>
      </div>
    </div>
    <div style="display: block;" class="col-md-4 display-no">
      <div style="position: static;" class="form-group">
        <label for="input-text-1">Bill Paid</label>
        <select class="form-control" id="BillPaid" name="BillPaid">
          <option {!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityBillPaid==1 ? "selected" : "" !!} value="1">Client</option>
          <option {!! $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityBillPaid==2 ? "selected" : "" !!} value="2">Facility</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-4 display-no">
      <div style="position: static;" class="form-group ">
        <label for="input-text-1">PAS Request</label>
        <div class="input-group">
          <input type="text" placeholder="--/--/----" value="{!! date("d/m/Y", strtotime($clientBasicInfo[0]->clientFacilityDetail->ClientFacilityPassRequestDate)) !!}" class="form-control datepicker" id="PASRequest" name="PASRequest">
          <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
      </div>
    </div>
    <div style="display: block;" class="col-md-4 display-no">
      <div style="position: static;" class="form-group ">
        <label for="input-text-1">PAS Receive</label>
        <div class="input-group">
          <input type="text" placeholder="--/--/----" class="form-control datepicker" value="{!! date("d/m/Y", strtotime($clientBasicInfo[0]->clientFacilityDetail->ClientFacilityPassReceivedDate)) !!}" id="PASReceive" name="PASReceive">
          <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 pd-col-4">
      <h3>Medicaid Information</h3>
    </div>
  </div>
  <div class="row">
  <input type="hidden" name="MedicaidDetailsId" value="{!! base64_encode($clientBasicInfo[0]->clientsMedicaidDetail->id) !!}" />
    <div style="display: block;" class="col-md-4 display-no">
      <div style="position: static;" class="form-group {{ $errors->first('MedicaidNeeded', 'has-error') }} ">
        <label for="input-text-1">Medicaid Needed</label>
        <div class="input-group">
          <input type="text" value="{!! date("d/m/Y", strtotime($clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsNeedDate)) !!}" placeholder="--/--/----" class="form-control datepicker" id="MedicaidNeeded" name="MedicaidNeeded">
          <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
        <div class="col-sm-11"> {!! $errors->first('MedicaidNeeded', '<span style="color:red;">:message</span>') !!} </div>
      </div>
    </div>
    <div class="col-md-4 display-no" style="display: block;">
      <div class="form-group {{ $errors->first('CaseworkerName', 'has-error') }}" style="position: static;">
        <label for="input-text-1">Caseworker Name</label>
        <input type="text" placeholder="Caseworker Name" value="{!! $clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsCaseWorkerName !!}" id="CaseworkerName" class="form-control" name="CaseworkerName">
        <div class="col-sm-11"> {!! $errors->first('CaseworkerName', '<span style="color:red;">:message</span>') !!} </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 display-no" style="display: block;">
      <div class="form-group {{ $errors->first('IncomeBracket', 'has-error') }}" style="position: static;">
        <label for="input-text-1">Income Bracket</label>
        <select class="form-control" id="IncomeBracket" name="IncomeBracket">
          <option value="">Income Bracket</option>
          <option {!! $clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsIncomBracket==1 ? "selected" : "" !!} value="1">Above Income Cap</option>
          <option {!! $clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsIncomBracket==2 ? "selected" : "" !!} value="2">Below Income Cap</option>
          <option {!! $clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsIncomBracket==2 ? "selected" : "" !!} value="3">Unknown</option>
        </select>
        <div class="col-sm-11"> {!! $errors->first('IncomeBracket', '<span style="color:red;">:message</span>') !!} </div>
      </div>
    </div>
    <div class="col-md-4 display-no" style="display: block;">
      <div class="form-group" style="position: static;">
        <label for="input-text-1">County</label>
        <input type="text" placeholder="County" value="{!! $clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsCounty !!}" id="County" name="County" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-4 display-no">
      <div style="position: static;" class="form-group ">
        <label for="input-text-1">Date QIT Established</label>
        <div class="input-group">
          <input type="text" placeholder="--/--/----" value="{!! date("d/m/Y", strtotime($clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsQitEstablishedDate)) !!}" class="form-control datepicker" id="QITEstablished" name="QITEstablished">
          <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
      </div>
    </div>
    <div style="display: block;" class="col-md-4 display-no">
      <div style="position: static;" class="form-group ">
        <label for="input-text-1">Submission Date</label>
        <div class="input-group">
          <input type="text" value="{!! date("d/m/Y", strtotime($clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsSubmissionDate)) !!}" placeholder="--/--/----" class="form-control datepicker" id="SubmissionDate" name="SubmissionDate">
          <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-4 display-no">
      <div style="position: static;" class="form-group ">
        <label for="input-text-1">Approval Date</label>
        <div class="input-group">
          <input type="text" value="{!! date("d/m/Y", strtotime($clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsApprovalDate)) !!}" placeholder="--/--/----" class="form-control datepicker" id="ApprovalDate" name="ApprovalDate">
          <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 pd-col-4">
      <h3>Office Use</h3>
    </div>
  </div>
  <div class="row">
    <div style="display: block;" class="col-md-4">
      <div style="position: static;" class="form-group {{ $errors->first('ClientStatus', 'has-error') }}">
        <label for="select-1">Client Status</label>
        <select class="form-control" id="ClientStatus" name="ClientStatus">
          <option value="">Select Client Status</option>
          <option {!! $clientBasicInfo[0]->officeUSeModel->ClientOfficeUseStatus==1 ? 'selected' : '' !!} value="1">Referral</option>
          <option {!! $clientBasicInfo[0]->officeUSeModel->ClientOfficeUseStatus==2 ? 'selected' : '' !!}  value="2">Appointment needed</option>
          <option {!! $clientBasicInfo[0]->officeUSeModel->ClientOfficeUseStatus==3 ? 'selected' : '' !!} value="3">Retained</option>
          <option {!! $clientBasicInfo[0]->officeUSeModel->ClientOfficeUseStatus==4 ? 'selected' : '' !!} value="4">Closed</option>
        </select>
        <div class="col-sm-11"> {!! $errors->first('ClientStatus', '<span style="color:red;">:message</span>') !!} </div>
      </div>
    </div>
    <div style="display: block;" class="col-md-4">
      <div style="position: static;" class="form-group {{ $errors->first('Specialist', 'has-error') }}">
        <label for="select-1">Specialist</label>
        <select class="form-control" id="Specialist" name="Specialist">
            @if(count($Users) > 0)
            <option value="">Select Specialist</option>
            @foreach($Users as $User)
            <option {!! $clientBasicInfo[0]->SpecialistUserId==$User->id ? 'selected' : '' !!} value="{!! $User->id !!}">{!! $User->first_name !!} {!! $User->last_name !!}</option>
            @endforeach
            <option value="">No Specialist Found</option>
            @endif
        </select>
        <input type="hidden" name="OfficeUSeId" value="{!! base64_encode($clientBasicInfo[0]->id) !!}" />
        <div class="col-sm-11"> {!! $errors->first('Specialist', '<span style="color:red;">:message</span>') !!} </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 pd-col-4">&nbsp;</div>
    <div class="col-md-4 pd-col-4">&nbsp;</div>
    <div class="col-md-4 pd-col-4">
      <button type="button" style="float:right" class="btn btn-lg btn-primary EditFromClass">Save</button>
    </div>
  </div>
</form>
<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}" type="text/javascript"></script> 
<script>
	$('.datepicker').datepicker({
		format:'dd/mm/yyyy'
	});
</script>