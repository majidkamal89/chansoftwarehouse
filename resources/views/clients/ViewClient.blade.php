@extends('layouts/default')

{{-- Page title --}}
@section('title')
View Client
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/css/datepicker.css') }}" rel="stylesheet" />
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
  <h1>Clients</h1>
  <ol class="breadcrumb">
    <li> <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard </a> </li>
    <li>Clients</li>
    <li class="active">View Client</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">{!! $clientBasicInfo[0]->ClientFirstName." ".$clientBasicInfo[0]->ClientLastName !!}</h3>
          <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> </span> </div>
        <div class="panel-body">
          <div class="bs-example">
            <ul style="margin-bottom: 15px;" class="nav nav-tabs">
              <li class="active"> <a data-toggle="tab" href="#home">Client Information</a> </li>
              <li> <a data-toggle="tab" href="#profile">Documents</a> </li>
            </ul>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 2550px;">
              <div class="tab-content" id="myTabContent" style="overflow: hidden; width: auto; height: 2550px;">
                <div id="home" class="tab-pane fade active in">
                  <section class="content">
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-4">
                        <h1 style="text-decoration:underline">Client Information</h1>
                      </div>
                      <div class="col-md-5">&nbsp;</div>
                      <div class="col-md-3"><i style="font-size:50px; cursor:pointer" data-attr="{!! base64_encode($clientBasicInfo[0]->id) !!}" class="fa fa-fw fa-edit get-Client"></i>&nbsp;</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4"><strong>First Name</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->ClientFirstName }}</div>
                      <div class="col-md-4"><strong>Initial</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->ClientInital }}</div>
                      <div class="col-md-4"><strong>Last Name</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->ClientLastName }}</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-3"><strong>Date Of Birth</strong>:{{ date("d/m/Y", strtotime($clientBasicInfo[0]->ClientDateOfBirth)) }}</div>
                      <div class="col-md-3"><strong>Social Security Number</strong>:{{ $clientBasicInfo[0]->ClientSocialSecurityNumber }}</div>
                      <div class="col-md-6">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    {{--*/
                    $previousAddress = $clientBasicInfo[0]->ClientPreviousAddress1." ".$clientBasicInfo[0]->ClientPreviousAddress2.",".$clientBasicInfo[0]->ClientPreviousCity." ".$clientBasicInfo[0]->ClientPreviousZip.",".$clientBasicInfo[0]->ClientPreviousState;
                    
                    $additionalAddress = $clientBasicInfo[0]->ClientAdditionalAddress1.",".$clientBasicInfo[0]->ClientAdditionalAddress2.",".$clientBasicInfo[0]->ClientAdditionalCity." ".$clientBasicInfo[0]->ClientAdditionalZip.",".$clientBasicInfo[0]->ClientAdditionalState;
                    /*--}}
                    <div class="row">
                      <div class="col-md-6"><strong>Previous Address</strong>:&nbsp;&nbsp;&nbsp;{{ $previousAddress }}</div>
                      <div class="col-md-6">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-6"><strong>Additional Address</strong>:&nbsp;&nbsp;&nbsp;{{ $additionalAddress }}</div>
                      <div class="col-md-6">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-6"><strong>Birth Place</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->ClientBirthPlace }}</div>
                      <div class="col-md-6">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    @if(count($clientBasicInfo[0]->clientsContacts) > 0)
                    {{--*/
                    $count = 1;
                    /*--}}
                    @foreach($clientBasicInfo[0]->clientsContacts as $contactData)
                    <div class="row">
                      <div class="col-md-4"><strong>Contact Name {{ $count }}</strong>:&nbsp;&nbsp;&nbsp;{{ $contactData->ClientContactName }}</div>
                      <div class="col-md-4"><strong>Relationship</strong>:&nbsp;&nbsp;&nbsp;{{ $contactData->ClientContactRelation }}</div>
                      <div class="col-md-2">
                        <input type="checkbox" disabled="disabled" {{ $contactData->
                        ClientContactMainContact==1 ? 'checked' : '' }} />&nbsp;&nbsp;&nbsp;<strong>Main Contact</strong></div>
                      <div class="col-md-2">
                        <input type="checkbox" disabled="disabled" {{ $contactData->
                        ClientContactPoa==1 ? 'checked' : '' }} />&nbsp;&nbsp;&nbsp;<strong>POA</strong></div>
                    </div>
                    <div class="row">&nbsp;</div>
                    {{--*/
                    $contactAddress = $contactData->ClientContactAddress1." ".$contactData->ClientContactAddress2." , ".$contactData->ClientContactCity." ".$contactData->ClientContactState." , ".$contactData->ClientContactZip;
                    /*--}}
                    <div class="row">
                      <div class="col-md-4"><strong>Contact Address</strong>:&nbsp;&nbsp;&nbsp;{{ $contactAddress }}</div>
                      <div class="col-md-8">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-3"><strong>Home Phone</strong>:&nbsp;&nbsp;&nbsp;{{ $contactData->ClientContactHomePhone }}</div>
                      <div class="col-md-3"><strong>Email</strong>:&nbsp;&nbsp;&nbsp;{{ $contactData->ClientContactEmail }}</div>
                      <div class="col-md-3"><strong>Mobile Number</strong>:&nbsp;&nbsp;&nbsp;{{ $contactData->ClientContactMobile }}</div>
                      <div class="col-md-3">&nbsp;</div>
                    </div>
                    {{--*/
                    $count++;
                    /*--}}
                    <div class="row">&nbsp;</div>
                    @endforeach
                    @endif
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-4">
                        <h1 style="text-decoration:underline">Facility Information</h1>
                      </div>
                      <div class="col-md-6"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-2"><strong>Name Of Facility</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->facilitiesInfo->FacilityName }}</div>
                      <div class="col-md-3"><strong>Address</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->facilitiesInfo->FacilityAddress }}</div>
                      <div class="col-md-1"><strong>City</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->facilitiesInfo->FacilityCity }}</div>
                      <div class="col-md-2"><strong>State</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->facilitiesInfo->FacilityState }}</div>
                      <div class="col-md-2"><strong>Zip</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->facilitiesInfo->FacilityZip }}</div>
                      <div class="col-md-2"><strong>County</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->facilitiesInfo->FacilityCounty }}</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-3"><strong>Phone Number</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->facilitiesInfo->FacilityPhoneNumber }}</div>
                      <div class="col-md-3"><strong>Email</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->facilitiesInfo->FacilityEmail }}</div>
                      <div class="col-md-2"><strong>Type</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->facilitiesInfo->FacilityType==1 ? 'SNF' : 'ALF' }}</div>
                      <div class="col-md-3"><strong>Participate in Medicaid</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->facilitiesInfo->FacilityParticipateMedicare==1 ? 'Yes' : 'No' }}</div>
                      <div class="col-md-1">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-3"><strong>Number of Clients</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->facilitiesInfo->FacilityNumberOfContacts }}</div>
                      <div class="col-md-9">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</di>
                    @if (count($clientBasicInfo[0]->facilitiesContactInfo) > 0)
                    {{--*/
                    $countContact=1;
                    /*--}}
                    @foreach($clientBasicInfo[0]->facilitiesContactInfo as $facilityContactData)
                    <div class="row">
                      <div class="col-md-3"><strong>Contact {{ $countContact }} Name</strong>:&nbsp;&nbsp;&nbsp;{{ $facilityContactData->FacilityContactName }}</div>
                      <div class="col-md-3"><strong>Contact {{ $countContact }} Title</strong>:&nbsp;&nbsp;&nbsp;{{ $facilityContactData->FacilityContactTitle }}</div>
                      <div class="col-md-3"><strong>Contact {{ $countContact }} Phone</strong>:&nbsp;&nbsp;&nbsp;{{ $facilityContactData->FacilityContactPhone }}</div>
                      <div class="col-md-3"><strong>Contact {{ $countContact }} Email</strong>:&nbsp;&nbsp;&nbsp;{{ $facilityContactData->FacilityContactEmail }}</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    {{--*/
                    $countContact++;
                    /*--}}
                    @endforeach
                    @endif
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-3"><strong>Daily Rate</strong>:&nbsp;&nbsp;&nbsp;{{ $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityRate }}</div>
                      <div class="col-md-3">
                        <input type="checkbox" disabled="disabled" {{ $clientBasicInfo[0]->clientFacilityDetail->
                        ClientFacilityOutStandingBill==1 ? 'checked' : '' }} />&nbsp;&nbsp;&nbsp;<strong>Out Standing Bill</strong>?</div>
                      <div class="col-md-3">
                        <input type="checkbox" disabled="disabled" {{ $clientBasicInfo[0]->clientFacilityDetail->
                        ClientFacilityLastPayStatus==1 ? 'checked' : '' }} />&nbsp;&nbsp;&nbsp;<strong>Last Payment Date</strong>?&nbsp;&nbsp;{{ date("d/m/Y", strtotime($clientBasicInfo[0]->clientFacilityDetail->ClientFacilityLastPayDate)) }}</div>
                      <div class="col-md-3">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-3"><strong>Starting using medicare benefits</strong>:&nbsp;&nbsp;&nbsp;{{ date("d/m/Y", strtotime($clientBasicInfo[0]->clientFacilityDetail->ClientFacilityMedicareBenifitsStartDate)) }}</div>
                      <div class="col-md-3"><strong>Medicare end date</strong>:&nbsp;&nbsp;&nbsp;{{ date("d/m/Y", strtotime($clientBasicInfo[0]->clientFacilityDetail->ClientFacilityMedicareEndDate)) }}</div>
                      <div class="col-md-3">
                        <input type="checkbox" disabled="disabled" {{ $clientBasicInfo[0]->clientFacilityDetail->
                        ClientFacilitySecurityDepositeStatus==1 ? 'checked' : '' }} />&nbsp;&nbsp;&nbsp;<strong>Security deposit</strong>?&nbsp;{{ $clientBasicInfo[0]->clientFacilityDetail->ClientFacilitySecurityDeposite }}</div>
                      <div class="col-md-3">
                        <input type="checkbox" disabled="disabled" {{ $clientBasicInfo[0]->clientFacilityDetail->
                        ClientFacilityPnaStatus==1 ? 'checked' : '' }} />&nbsp;&nbsp;&nbsp;<strong>PNA</strong>? {{ $clientBasicInfo[0]->clientFacilityDetail->ClientFacilityPna }}</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-3">
                        <input type="checkbox" disabled="disabled" {{ $clientBasicInfo[0]->clientFacilityDetail->
                        ClientFacilityMocSsiBenefits==1 ? 'checked' : '' }} /> <strong>Enrolled in MCO or receiving SSI Benefits</strong>?</div>
                      <div class="col-md-3"><strong>Billed Paid</strong>: Facility</div>
                      <div class="col-md-6">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-3"><strong>PAS Request</strong>:{{ date("d/m/Y", strtotime($clientBasicInfo[0]->clientFacilityDetail->ClientFacilityPassRequestDate)) }}</div>
                      <div class="col-md-3"><strong>PAS Received</strong>:{{ date("d/m/Y", strtotime($clientBasicInfo[0]->clientFacilityDetail->ClientFacilityPassReceivedDate)) }}</div>
                      <div class="col-md-6">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-4">
                        <h1 style="text-decoration:underline">Medicaid Information</h1>
                      </div>
                      <div class="col-md-6"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"><strong>Medicaid Needed</strong>:{{ date("d/m/Y", strtotime($clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsNeedDate)) }}</div>
                      <div class="col-md-3"><strong>Caseworked Name</strong>:{{ $clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsCaseWorkerName }}</div>
                      <div class="col-md-3"></div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-3"><strong>Income Bracket</strong>:
                        @if($clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsIncomBracket==1) 
                        Above Income Cap
                        @elseif($clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsIncomBracket==2)
                        Below Income Cap
                        @elseif($clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsIncomBracket==3)
                        Unknown
                        @else
                        --
                        @endif </div>
                      <div class="col-md-3"><strong>County</strong>:{{ $clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsCounty }}</div>
                      <div class="col-md-6">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-3"><strong>Date QIT Established</strong>:{{ date("d/m/Y", strtotime($clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsQitEstablishedDate)) }}</div>
                      <div class="col-md-3"><strong>Submission Date</strong>:{{ date("d/m/Y", strtotime($clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsSubmissionDate)) }}</div>
                      <div class="col-md-6">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-3">&nbsp;</div>
                      <div class="col-md-3"><strong>Approve Date</strong>:{{ date("d/m/Y", strtotime($clientBasicInfo[0]->clientsMedicaidDetail->ClientMedicaidDetailsApprovalDate)) }}</div>
                      <div class="col-md-6">&nbsp;</div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-4">
                        <h1 style="text-decoration:underline;">Office Use</h1>
                      </div>
                      <div class="col-md-6"></div>
                    </div>
                    <div class="row">&nbsp;</div>
                    @if(count($clientBasicInfo[0]->officeUSeModel) > 0)
                    <div class="row">
                      <div class="col-md-3"><strong>Client Status</strong>:&nbsp;&nbsp;&nbsp;
                        @if($clientBasicInfo[0]->officeUSeModel->ClientOfficeUseStatus==1)
                        Referral
                        @elseif($clientBasicInfo[0]->officeUSeModel->ClientOfficeUseStatus==2)
                        Appointment needed
                        @elseif($clientBasicInfo[0]->officeUSeModel->ClientOfficeUseStatus==3)
                        Retained
                        @else
                        Closed
                        @endif </div>
                      <div class="col-md-3"><strong>Specialist</strong>:&nbsp;&nbsp;&nbsp;{!! $clientBasicInfo[0]->user->first_name." ".$clientBasicInfo[0]->user->last_name !!}</div>
                      <div class="col-md-6">&nbsp;</div>
                    </div>
                    @endif </section>
                </div>
                <div id="profile" class="tab-pane fade">
                  <p> Client Documents Will Here </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts') 
<script src="{{ asset('assets/js/clients.js') }}" type="text/javascript"></script> 
<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}" type="text/javascript"></script> 
<script>
	$('.datepicker').datepicker({
		format:'dd/mm/yyyy'
	});
</script> 
@stop 