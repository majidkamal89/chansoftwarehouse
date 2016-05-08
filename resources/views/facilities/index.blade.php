@extends('/layouts/default')

{{-- Page title --}}
@section('title')
Facilities
@parent
@stop
{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
  <h1>Facilities</h1>
  <ol class="breadcrumb">
    <li> <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard </a> </li>
    <li>Pages</li>
    <li class="active">Facilities </li>
  </ol>
</section>
<section class="content">
  <div class="portlet box default">
    <div class="portlet-title">
      <div class="caption"><strong>Facilities</strong> &nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-responsive btn-primary btn-sm" data-toggle="modal" data-target="#AddNewFacility" id="addButton">Add New</button>
      </div>
    </div>
    <div class="portlet-body">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Facility</th>
            <th>Address</th>
            <th>SNF/ALF</th>
            <th>Country</th>
            <th># Clients</th>
            <th>Medicaid Participating</th>
          </tr>
        </thead>
        <tbody id="FacilitiesLists">
        	@include('facilities/FacilitiesList')
        </tbody>
      </table>
    </div>
  </div>
</section>

<!--Add new Facility Modal -->
<div class="modal fade" id="AddNewFacility" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
	@include('facilities/AddForm') 
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts') 
<script src="{{ asset('assets/js/facilities.js') }}" type="text/javascript"></script> 
@stop 