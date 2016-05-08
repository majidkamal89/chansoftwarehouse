<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close closeForm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Add New Facility</h4>
    </div>
    <div class="modal-body">
    <div class="alert alert-success" id="successMessage" style="display:none;"></div>
    <form method="psot" id="AddnewFacility" name="AddnewFacility">
      <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
      <div class="row">
        <div class="col-md-3"><strong>Facility Name</strong>:</div>
        <div class="col-xs-12 col-sm-6 col-md-9">
          <div class="form-group {{ $errors->first('FacilityName', 'has-error') }}">
            <input type="text" name="FacilityName" id="facilityName" value="{!! Input::get('FacilityName') !!}" class="form-control input-md" placeholder="Facility Name">
            <div class="col-sm-11"> {!! $errors->first('FacilityName', '<span style="color:red;">:message</span>') !!} </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"><strong>Address</strong>:</div>
        <div class="col-xs-12 col-sm-6 col-md-9">
          <div class="form-group {{ $errors->first('FacilityAddress', 'has-error') }}">
            <input type="text" value="{!! Input::get('FacilityAddress') !!}" name="FacilityAddress" id="FacilityAddress" class="form-control input-md" placeholder="Address">
            <div class="col-sm-11"> {!! $errors->first('FacilityAddress', '<span style="color:red;">:message</span>') !!} </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"><strong>City</strong>:</div>
        <div class="col-xs-12 col-sm-6 col-md-9">
          <div class="form-group {{ $errors->first('FacilityCity', 'has-error') }}">
            <input type="text" value="{!! Input::get('FacilityCity') !!}" name="FacilityCity" id="FacilityCity" class="form-control input-md" placeholder="City">
            <div class="col-sm-11"> {!! $errors->first('FacilityCity', '<span style="color:red;">:message</span>') !!} </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"><strong>State</strong>:</div>
        <div class="col-xs-12 col-sm-6 col-md-9">
          <div class="form-group {{ $errors->first('FacilityState', 'has-error') }}">
            <select id="FacilityState" name="FacilityState" class="form-control">
              <option value="">Select State</option>
              <option {!! Input::get('FacilityState')=='Alabama' ? "selected" : "" !!} value="Alabama">Alabama</option>
              <option {!! Input::get('FacilityState')=='NewYork' ? "selected" : "" !!} value="NewYork">NewYork</option>
            </select>
            <div class="col-sm-11">{!! $errors->first('FacilityState', '<span style="color:red;">:message</span>') !!}</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"><strong>Zip</strong>:</div>
        <div class="col-xs-12 col-sm-6 col-md-9">
          <div class="form-group {{ $errors->first('FacilityZip', 'has-error') }}">
            <input type="text" value="{!! Input::get('FacilityZip') !!}" name="FacilityZip" id="FacilityZip" class="form-control input-md" placeholder="Zip">
            <div class="col-sm-11">{!! $errors->first('FacilityZip', '<span style="color:red;">:message</span>') !!}</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"><strong>County</strong>:</div>
        <div class="col-xs-12 col-sm-6 col-md-9">
          <div class="form-group {{ $errors->first('FacilityCounty', 'has-error') }}">
            <input type="text" value="{!! Input::get('FacilityZip') !!}" name="FacilityCounty" id="FacilityCounty" class="form-control input-md" placeholder="County">
            <div class="col-sm-11">{!! $errors->first('FacilityCounty', '<span style="color:red;">:message</span>') !!}</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"><strong>Phone Number</strong>:</div>
        <div class="col-xs-12 col-sm-6 col-md-9">
          <div class="form-group {{ $errors->first('FacilityPhoneNumber', 'has-error') }}">
            <input type="text" value="{!! Input::get('FacilityPhoneNumber') !!}" name="FacilityPhoneNumber" id="FacilityPhoneNumber" class="form-control input-md" placeholder="Phone Number">
            <div class="col-sm-11">{!! $errors->first('FacilityPhoneNumber', '<span style="color:red;">:message</span>') !!}</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"><strong>Email</strong>:</div>
        <div class="col-xs-12 col-sm-6 col-md-9">
          <div class="form-group {{ $errors->first('FacilityEmail', 'has-error') }}">
            <input type="text" value="{!! Input::get('FacilityEmail') !!}" name="FacilityEmail" id="FacilityEmail" class="form-control input-md" placeholder="Email">
            <div class="col-sm-11">{!! $errors->first('FacilityEmail', '<span style="color:red;">:message</span>') !!}</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"><strong>Type</strong>:</div>
        <div class="col-xs-12 col-sm-6 col-md-9">
          <div class="form-group {{ $errors->first('FacilityType', 'has-error') }}">
            <select id="FacilityType" class="form-control" name="FacilityType">
              <option value="">Select Type</option>
              <option {!! Input::get('FacilityType')==1 ? "selected" : "" !!} value="1">SNF</option>
              <option {!! Input::get('FacilityType')==2 ? "selected" : "" !!} value="2">ALF</option>
            </select>
            <div class="col-sm-11">{!! $errors->first('FacilityType', '<span style="color:red;">:message</span>') !!}</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"><strong>Participate in Medicaid</strong>:</div>
        <div class="col-xs-12 col-sm-6 col-md-9">
          <div class="form-group {{ $errors->first('FacilityParticipateMedicare', 'has-error') }}">
            <input type="radio" {!! Input::get('FacilityParticipateMedicare')==1 ? "checked" : "" !!} value="1" name="FacilityParticipateMedicare" id="yes" />
            &nbsp;&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" {!! Input::get('FacilityParticipateMedicare')==2 ? "checked" : "" !!} value="2" name="FacilityParticipateMedicare" id="no" />
            &nbsp;&nbsp;&nbsp;&nbsp;No
            <div class="col-sm-11">{!! $errors->first('FacilityParticipateMedicare', '<span style="color:red;">:message</span>') !!}</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <h4>Contacts</h4>
        </div>
        <div class="col-md-9">&nbsp;</div>
      </div>
      <div class="row">
        <div class="col-md-3"><strong>Num Of Contacts</strong>:</div>
        <div class="col-xs-12 col-sm-6 col-md-9">
          <div class="form-group {{ $errors->first('FacilityNumberOfContacts', 'has-error') }}">
            <select id="FacilityNumberOfContacts" class="form-control contactNumber" name="FacilityNumberOfContacts">
              <option value="">Select Number Of Contacts
              <option>
              <option {!! Input::get('FacilityNumberOfContacts')==1 ? "selected" : "" !!} value="1">1</option>
              <option {!! Input::get('FacilityNumberOfContacts')==2 ? "selected" : "" !!} value="2">2</option>
              <option {!! Input::get('FacilityNumberOfContacts')==3 ? "selected" : "" !!} value="3">3</option>
              <option {!! Input::get('FacilityNumberOfContacts')==4 ? "selected" : "" !!} value="4">4</option>
              <option {!! Input::get('FacilityNumberOfContacts')==5 ? "selected" : "" !!} value="5">5</option>
              <option {!! Input::get('FacilityNumberOfContacts')==6 ? "selected" : "" !!} value="6">6</option>
              <option {!! Input::get('FacilityNumberOfContacts')==7 ? "selected" : "" !!} value="7">7</option>
            </select>
            <div class="col-sm-11">{!! $errors->first('FacilityNumberOfContacts', '<span style="color:red;">:message</span>') !!}</div>
          </div>
        </div>
      </div>
      <div id="ContactNumbers"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default closeForm" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary saveForm">Save</button>
      </div>
    </form>
  </div>
</div>
