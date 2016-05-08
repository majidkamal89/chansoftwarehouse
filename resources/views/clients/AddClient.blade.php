@extends('layouts/default')

{{-- Page title --}}
@section('title')
Add Client
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
    <li class="active">Add Client</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"> Clients </h3>
          <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> </span> </div>
        <div class="panel-body">
          <div class="bs-example">
            <ul style="margin-bottom: 15px;" class="nav nav-tabs">
              <li class="active"> <a data-toggle="tab" href="#home">Client Information</a> </li>
              <li> <a data-toggle="tab" href="#profile">Documents</a> </li>
            </ul>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 2000px;">
              <div class="tab-content" id="myTabContent" style="overflow: hidden; width: auto; height: 2000px;">
                <div id="home" class="tab-pane fade active in">
                  <div class="row">
                    <div class="col-md-4 pd-col-4">
                      <h3>Client Information</h3>
                    </div>
                  </div>
                  <form method="post" id="addNewClient" name="addNewClient" action="{!! URL::route('addNewClient') !!}">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
                    <div class="row">
                      <div style="display: block;" class="col-md-5 display-no">
                        <div style="position: static;" class="form-group {{ $errors->first('FistName', 'has-error') }}">
                          <label for="input-text-1">First Name</label>
                          <input class="form-control" id="FistName" name="FistName" placeholder="Enter First Name" type="text" value="{!! Input::get('FistName') !!}">
                          <div class="col-sm-11"> {!! $errors->first('FistName', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Initial</label>
                          <input class="form-control" value="{!! Input::get('Initial') !!}" id="Initial" name="Initial" placeholder="Enter Initial" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-5 display-no">
                        <div style="position: static;" class="form-group {{ $errors->first('LastName', 'has-error') }}">
                          <label for="input-text-2">Last Name</label>
                          <input class="form-control" id="LastName" name="LastName" placeholder="Enter Last Name" 
                          value="{!! Input::get('LastName') !!}" type="text">
                          <div class="col-sm-11"> {!! $errors->first('LastName', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-6 display-no">
                        <div style="position: static;" class="form-group {{ $errors->first('DateOfBirth', 'has-error') }} ">
                          <label for="input-text-1">Date Of Birth</label>
                          <div class="input-group">
                            <input type="text" placeholder="--/--/----" value="{!! Input::get('DateOfBirth') !!}" class="form-control datepicker" id="DateOfBirth" name="DateOfBirth">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
                          <div class="col-sm-11"> {!! $errors->first('DateOfBirth', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-6 display-no">
                        <div style="position: static;" class="form-group {{ $errors->first('SSNumber', 'has-error') }}">
                          <label for="input-text-2">Social Security Number</label>
                          <input class="form-control" id="SSNumber" name="SSNumber" value="{!! Input::get('SSNumber') !!}" placeholder="Enter Soical Security Number" type="text">
                          <div class="col-sm-11"> {!! $errors->first('SSNumber', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-3 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Previous Address</label>
                          <input class="form-control" value="{!! Input::get('PreviousAddress1') !!}"  id="PreviousAddress1" name="PreviousAddress1" placeholder="Address 1" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-3 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('PreviousAddress2') !!}" id="PreviousAddress2" name="PreviousAddress2" placeholder="Address 2" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('PreviousCity') !!}" id="PreviousCity" name="PreviousCity" placeholder="City" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2">
                        <div style="position: static;" class="form-group">
                          <label for="select-1">&nbsp;</label>
                          <select class="form-control" id="PreviousState" name="PreviousState">
                            <option {!! Input::get('PreviousState')=="" ? "selected" : "" !!} value="">State</option>
                            <option {!! Input::get('PreviousState')=='Alabama' ? "selected" : "" !!} value="Alabama">Alabama</option>
              				<option {!! Input::get('PreviousState')=='NewYork' ? "selected" : "" !!} value="NewYork">NewYork</option>
                          </select>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('PreviousZip') !!}" id="PreviousZip" name="PreviousZip" placeholder="Zip" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-3 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Additional Address</label>
                          <input class="form-control" value="{!! Input::get('AdditionalAddress1') !!}" id="AdditionalAddress1" name="AdditionalAddress1" placeholder="Address 1" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-3 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('AdditionalAddress2') !!}" id="AdditionalAddress2" name="AdditionalAddress2" placeholder="Address 2" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('AdditionalCity') !!}" id="AdditionalCity" name="AdditionalCity" placeholder="City" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2">
                        <div style="position: static;" class="form-group">
                          <label for="select-1">&nbsp;</label>
                          <select class="form-control" id="AdditionalState" name="AdditionalState">
                            <option {!! Input::get('AdditionalState')=="" ? "selected" : "" !!} value="">State</option>
                            <option {!! Input::get('AdditionalState')=='Alabama' ? "selected" : "" !!} value="Alabama">Alabama</option>
              				<option {!! Input::get('AdditionalState')=='NewYork' ? "selected" : "" !!} value="NewYork">NewYork</option>
                          </select>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('AdditionalZip') !!}" id="AdditionalZip" name="AdditionalZip" placeholder="Zip" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-6 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Birth Place</label>
                          <input class="form-control" value="{!! Input::get('BirthPlace') !!}"  id="BirthPlace" name="BirthPlace" placeholder="Enter Birth Place" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group {{ $errors->first('Contact1Name', 'has-error') }}">
                          <label for="input-text-1">Contact Name 1</label>
                          <input class="form-control" value="{!! Input::get('Contact1Name') !!}" id="Contact1Name" name="Contact1Name" placeholder="Contact Name 1" type="text">
                          <div class="col-sm-11"> {!! $errors->first('Contact1Name', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2">
                        <div style="position: static;" class="form-group {{ $errors->first('Contact1Relation', 'has-error') }}">
                          <label for="select-1">Relationship</label>
                          <input class="form-control" value="{!! Input::get('Contact1Relation') !!}" id="Contact1Relation" name="Contact1Relation" placeholder="Relationship" type="text">
                          <div class="col-sm-11"> {!! $errors->first('Contact1Relation', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-3">
                        <label for="input-text-1">&nbsp;</label>
                        <div style="position: static;" class="checkbox">
                          <label>
                            <input type="checkbox" {!! Input::get('Contact1Main')==1 ? "checked" : "" !!} value="1" id="Contact1Main" name="Contact1Main">
                            <span>Main Contact</span> </label>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-3">
                        <label for="input-text-1">&nbsp;</label>
                        <div style="position: static;" class="checkbox">
                          <label>
                            <input type="checkbox" value="1" {!! Input::get('Contact1POA')==1 ? "checked" : "" !!} id="Contact1POA" name="Contact1POA">
                            <span>POA</span> </label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-3 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Contact Address</label>
                          <input class="form-control" value="{!! Input::get('Contact1Address1') !!}" id="Contact1Address1" name="Contact1Address1" placeholder="Address 1" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-3 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('Contact1Address2') !!}" id="Contact1Address2" name="Contact1Address2" placeholder="Address 2" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('Contact1City') !!}" id="Contact1City" name="Contact1City" placeholder="City" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2">
                        <div style="position: static;" class="form-group">
                          <label for="select-1">&nbsp;</label>
                          <select class="form-control" id="Contact1State" name="Contact1State">
                            <option {!! Input::get('Contact1State')=="" ? "selected" : "" !!} value="">State</option>
                            <option {!! Input::get('Contact1State')=='Alabama' ? "selected" : "" !!} value="Alabama">Alabama</option>
              				<option {!! Input::get('Contact1State')=='NewYork' ? "selected" : "" !!} value="NewYork">NewYork</option>
                          </select>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('Contact1Zip') !!}" id="Contact1Zip" name="Contact1Zip" placeholder="Zip" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Home Phone</label>
                          <input class="form-control" value="{!! Input::get('Contact1HomePhone') !!}" id="Contact1HomePhone" name="Contact1HomePhone" placeholder="Home Phone" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Email</label>
                          <input class="form-control" value="{!! Input::get('Contact1Email') !!}" id="Contact1Email"  name="Contact1Email" placeholder="Email" type="email">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">Mobile</label>
                          <input class="form-control" value="{!! Input::get('Contact1Mobile') !!}" id="Contact1Mobile" name="Contact1Mobile" placeholder="Mobile" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Contact Name 2</label>
                          <input class="form-control" value="{!! Input::get('Contact2Name') !!}" id="Contact2Name" name="Contact2Name" placeholder="Contact Name 2" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2">
                        <div style="position: static;" class="form-group">
                          <label for="select-1">Relationship</label>
                          <input class="form-control" value="{!! Input::get('Contact2Relation') !!}" id="Contact2Relation" name="Contact2Relation" placeholder="Relationship" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-3">
                        <label for="input-text-1">&nbsp;</label>
                        <div style="position: static;" class="checkbox">
                          <label>
                            <input type="checkbox" {!! Input::get('Contact2Main')==1 ? "checked" : "" !!} value="1" id="Contact2Main" name="Contact2Main">
                            <span>Main Contact</span> </label>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-3">
                        <label for="input-text-1">&nbsp;</label>
                        <div style="position: static;" class="checkbox">
                          <label>
                            <input type="checkbox" {!! Input::get('Contact2POA')==1 ? "checked" : "" !!} value="1" id="Contact2POA" name="Contact2POA">
                            <span>POA</span> </label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-3 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Contact Address</label>
                          <input class="form-control" value="{!! Input::get('Contact2Address2') !!}" id="Contact2Address2" name="Contact2Address1" placeholder="Address 1" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-3 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('Contact2Address2') !!}" id="Contact2Address2" name="Contact2Address2" placeholder="Address 2" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('Contact2City') !!}" id="Contact2City" name="Contact2City" placeholder="City" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2">
                        <div style="position: static;" class="form-group">
                          <label for="select-1">&nbsp;</label>
                          <select class="form-control" id="Contact2State" name="Contact2State">
                            <option {!! Input::get('Contact2State')=="" ? "selected" : "" !!} value="">State</option>
                            <option {!! Input::get('Contact2State')=='Alabama' ? "selected" : "" !!} value="Alabama">Alabama</option>
              				<option {!! Input::get('Contact2State')=='NewYork' ? "selected" : "" !!} value="NewYork">NewYork</option>
                          </select>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('Contact2Zip') !!}" id="Contact2Zip" name="Contact2Zip" placeholder="Zip" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Home Phone</label>
                          <input class="form-control" value="{!! Input::get('Contact2HomePhone') !!}" id="Contact2HomePhone" name="Contact2HomePhone" placeholder="Home Phone" type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Email</label>
                          <input class="form-control" value="{!! Input::get('Contact2Email') !!}" id="Contact2Email"  name="Contact2Email" placeholder="Email" type="email">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-2">Mobile</label>
                          <input class="form-control" value="{!! Input::get('Contact2Mobile') !!}" id="Contact2Mobile" name="Contact2Mobile" placeholder="Mobile" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 pd-col-4">
                        <h3>Facility Information</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-4">
                        <div style="position: static;" class="form-group {{ $errors->first('NameOfFacility', 'has-error') }}">
                          <label for="select-1">Name of Facility</label>
                          <select class="form-control" id="NameOfFacility" name="NameOfFacility">
                                                       @if(count($Facilities) > 0)
                            <option {!! Input::get('NameOfFacility')=="" ? "selected" : "" !!} value="">Select Facility</option>
                            								@foreach($Facilities as $Facility)
                            <option value="{!! $Facility->id !!}" {!! Input::get('NameOfFacility')==$Facility->id ? "selected" : "" !!} >{!! $Facility->FacilityName !!}</option>
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
                          <input class="form-control" value="{!! Input::get('DailyRate') !!}" id="DailyRate" name="DailyRate" placeholder="Daily Rate" type="text">
                          <div class="col-sm-11"> {!! $errors->first('DailyRate', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-3">
                        <label for="select-1">&nbsp;</label>
                        <div style="position: static;" class="checkbox">
                          <label>
                            <input type="checkbox" {!! Input::get('OutstandingBill')==1 ? "checked" : "" !!} value="1" id="OutstandingBill" name="OutstandingBill">
                            <span>Outstanding Bill</span> </label>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-3">
                        <label for="select-1">&nbsp;</label>
                        <div style="position: static;" class="checkbox">
                          <label>
                            <input type="checkbox" value="1" {!! Input::get('LastPayment')==1 ? "checked" : "" !!} id="LastPayment" name="LastPayment">
                            <span>Last Payment Date</span> </label>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-3 display-no">
                        <div style="position: static;" class="form-group ">
                          <label for="input-text-1">&nbsp;</label>
                          <div class="input-group">
                            <input type="text" value="{!! Input::get('LastPaymentDate') !!}" placeholder="--/--/----" class="form-control datepicker" id="LastPaymentDate" name="LastPaymentDate" {!! Input::get('LastPayment')==1 ? '' : 'disabled' !!} >
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group ">
                          <label for="input-text-1">Started Using Medicare benefits</label>
                          <div class="input-group">
                            <input type="text" value="{!! Input::get('MedicareBenifitsStartDate') !!}" placeholder="--/--/----" class="form-control datepicker" id="MedicareBenifitsStartDate" name="MedicareBenifitsStartDate">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group ">
                          <label for="input-text-1">Medicare end <br/>
                            date</label>
                          <div class="input-group">
                            <input type="text" value="{!! Input::get('MedicareEndDate') !!}" placeholder="--/--/----" class="form-control datepicker" id="MedicareEndDate" name="MedicareEndDate">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2">
                        <label for="select-1">&nbsp;</label>
                        <div style="position: static;" class="checkbox">
                          <label>
                            <input type="checkbox" {!! Input::get('SecurityDepositeStatus')==1 ? "checked" : "" !!} value="1" id="SecurityDepositeStatus" name="SecurityDepositeStatus">
                            <span>Security Deposit</span> </label>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">&nbsp;</label>
                          <br/>
                          <input class="form-control" value="{!! Input::get('SecurityDeposite') !!}" id="SecurityDeposite" name="SecurityDeposite" placeholder="Security Deposit" {!! Input::get('SecurityDepositeStatus')==1 ? '' : 'disabled' !!} type="text">
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2">
                        <label for="select-1">&nbsp;</label>
                        <div style="position: static;" class="checkbox">
                          <label>
                            <input type="checkbox" {!! Input::get('PnaStatus')==1 ? "checked" : "" !!} value="1" id="PnaStatus" name="PnaStatus">
                            <span>PNA</span> </label>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-2 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">&nbsp;</label>
                          <input class="form-control" value="{!! Input::get('Pna') !!}" name="Pna" id="Pna" {!! Input::get('PnaStatus')==1 ? '' : 'disabled' !!} placeholder="PNA" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-3">
                        <label for="input-text-1">&nbsp;</label>
                        <div style="position: static;" class="checkbox">
                          <label>
                            <input type="checkbox" value="1" {!! Input::get('MocSsiBenefits')==1 ? "checked" : "" !!} id="MocSsiBenefits" name="MocSsiBenefits">
                            <span>Enrolled in MCO or receiving SSI Benefits?</span> </label>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group">
                          <label for="input-text-1">Bill Paid</label>
                          <select class="form-control" id="BillPaid" name="BillPaid">
                            <option {!! Input::get('BillPaid')== "" ? "selected" : "" !!} value="">Select</option>
                            <option {!! Input::get('BillPaid')== "1" ? "selected" : "" !!} value="1">Client</option>
                            <option {!! Input::get('BillPaid')== "2" ? "selected" : "" !!} value="2">Facility</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group ">
                          <label for="input-text-1">PAS Request</label>
                          <div class="input-group">
                            <input type="text" value="{!! Input::get('PASRequest') !!}" placeholder="--/--/----" class="form-control datepicker" id="PASRequest" name="PASRequest">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group ">
                          <label for="input-text-1">PAS Receive</label>
                          <div class="input-group">
                            <input type="text" value="{!! Input::get('PASReceive') !!}" placeholder="--/--/----" class="form-control datepicker" id="PASReceive" name="PASReceive">
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
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group {{ $errors->first('MedicaidNeeded', 'has-error') }} ">
                          <label for="input-text-1">Medicaid Needed</label>
                          <div class="input-group">
                            <input type="text" value="{!! Input::get('MedicaidNeeded') !!}" placeholder="--/--/----" class="form-control datepicker" id="MedicaidNeeded" name="MedicaidNeeded">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
                          <div class="col-sm-11"> {!! $errors->first('MedicaidNeeded', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                      <div class="col-md-4 display-no" style="display: block;">
                        <div class="form-group {{ $errors->first('CaseworkerName', 'has-error') }}" style="position: static;">
                          <label for="input-text-1">Caseworker Name</label>
                          <input type="text" value="{!! Input::get('CaseworkerName') !!}" placeholder="Caseworker Name" id="CaseworkerName" class="form-control" name="CaseworkerName">
                          <div class="col-sm-11"> {!! $errors->first('CaseworkerName', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 display-no" style="display: block;">
                        <div class="form-group {{ $errors->first('IncomeBracket', 'has-error') }}" style="position: static;">
                          <label for="input-text-1">Income Bracket</label>
                          <select class="form-control" id="IncomeBracket" name="IncomeBracket">
                            <option  {!! Input::get('IncomeBracket')== "" ? "selected" : "" !!} value="">Income Bracket</option>
                            <option  {!! Input::get('IncomeBracket')== "1" ? "selected" : "" !!} value="1">Above Income Cap</option>
                            <option  {!! Input::get('IncomeBracket')== "2" ? "selected" : "" !!} value="2">Below Income Cap</option>
                            <option  {!! Input::get('IncomeBracket')== "3" ? "selected" : "" !!} value="3">Unknown</option>
                          </select>
                          <div class="col-sm-11"> {!! $errors->first('IncomeBracket', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                      <div class="col-md-4 display-no" style="display: block;">
                        <div class="form-group" style="position: static;">
                          <label for="input-text-1">County</label>
                          <input type="text" value="{!! Input::get('County') !!}" placeholder="County" id="County" name="County" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group ">
                          <label for="input-text-1">Date QIT Established</label>
                          <div class="input-group">
                            <input type="text" value="{!! Input::get('QITEstablished') !!}" placeholder="--/--/----" class="form-control datepicker" id="QITEstablished" name="QITEstablished">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group ">
                          <label for="input-text-1">Submission Date</label>
                          <div class="input-group">
                            <input type="text" value="{!! Input::get('SubmissionDate') !!}" placeholder="--/--/----" class="form-control datepicker" id="SubmissionDate" name="SubmissionDate">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-th"></span> </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div style="display: block;" class="col-md-4 display-no">
                        <div style="position: static;" class="form-group ">
                          <label for="input-text-1">Approval Date</label>
                          <div class="input-group">
                            <input type="text" value="{!! Input::get('ApprovalDate') !!}" placeholder="--/--/----" class="form-control datepicker" id="ApprovalDate" name="ApprovalDate">
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
                            <option {!! Input::get('ClientStatus')== "" ? "selected" : "" !!} value="">Select Client Status</option>
                            <option {!! Input::get('ClientStatus')== "1" ? "selected" : "" !!} value="1">Referral</option>
                            <option {!! Input::get('ClientStatus')== "2" ? "selected" : "" !!} value="2">Appointment needed</option>
                            <option {!! Input::get('ClientStatus')== "3" ? "selected" : "" !!} value="3">Retained</option>
                            <option {!! Input::get('ClientStatus')== "4" ? "selected" : "" !!} value="4">Closed</option>
                          </select>
                          <div class="col-sm-11"> {!! $errors->first('ClientStatus', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                      <div style="display: block;" class="col-md-4">
                        <div style="position: static;" class="form-group {{ $errors->first('Specialist', 'has-error') }}">
                          <label for="select-1">Specialist</label>
                          <select class="form-control" id="Specialist" name="Specialist">
                            
                            
                            
                            
                                                          @if(count($Users) > 0)
                                                       			
                            
                            
                            
                            <option {!! Input::get('Specialist')== "" ? "selected" : "" !!} value="">Select Specialist</option>
                            
                            
                            
                            
                            								@foreach($Users as $User)
                                                         		
                            
                            
                            
                            <option {!! Input::get('Specialist')== $User->id ? "selected" : "" !!}  value="{!! $User->id !!}">{!! $User->first_name !!} {!! $User->last_name !!}</option>
                            
                            
                            
                            
                                                             @endforeach
                                                       @else
                               								
                            
                            
                            
                            <option value="">No Specialist Found</option>
                            
                            
                            
                            
                                						@endif
                                                      
                          
                          
                          
                          </select>
                          <div class="col-sm-11"> {!! $errors->first('Specialist', '<span style="color:red;">:message</span>') !!} </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 pd-col-4">&nbsp;</div>
                      <div class="col-md-4 pd-col-4">&nbsp;</div>
                      <div class="col-md-4 pd-col-4">
                        <button type="submit" style="float:right" class="btn btn-lg btn-primary">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div id="profile" class="tab-pane fade">
                  <div class="row">
                  	<div class="col-md-12">
                    	<div class="col-md-3"><h1>Documents</h1></div>
                        <div class="col-md-3"><button>Upload File</button></div>
                        <div class="col-md-6">&nbsp;</div>
                    </div>
                  </div>
                  <div class="row">
                  	<div class="col-md-12">
                    	<div class="col-md-4"><h1>Documents</h1></div>
                        <div class="col-md-8">
                        	<table id="table1" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="table1_info">
                            <thead>
                            	<tr>
                                	<th><strong>Name</strong></th>
                                    <th><strong>Size</strong></th>
                                    <th><strong>Kind</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<tr>
                                	<td>Clinical Paper</td>
                                    <td>--</td>
                                    <td>Folder</td>
                                </tr>
                                <tr>
                                	<td>Document</td>
                                    <td>--</td>
                                    <td>Folder</td>
                                </tr>
                                <tr>
                                	<td>Proof of Citizenship</td>
                                    <td>--</td>
                                    <td>Folder</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
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