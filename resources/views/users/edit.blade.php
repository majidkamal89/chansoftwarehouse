@extends('/layouts/default')

{{-- Page title --}}
@section('title')
Users
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/material/vendors/noUiSlider/jquery.nouislider.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/material/vendors/farbtastic/farbtastic.css') }}" rel="stylesheet">
<link href="{{ asset('assets/material/vendors/summernote/summernote.css') }}" rel="stylesheet">
<link href="{{ asset('assets/material/vendors/material-icons/material-design-iconic-font.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/material/vendors/socicon/socicon.min.css') }}" rel="stylesheet">
        
<!-- CSS -->
<link href="{{ asset('assets/material/css/app.min.1.css') }}" rel="stylesheet">
<link href="{{ asset('assets/material/css/app.min.2.css') }}" rel="stylesheet">
@stop


{{-- Page content --}}
@section('content')
<section id="content">
    <div class="container">
        <div class="block-header">
            <h2>Edit User</h2>
        </div>
        
        <div class="card">
            <div class="card-header">
                <!-- errors -->
                <div class="has-error">
                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                    {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                    {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                    {!! $errors->first('group', '<span class="help-block">:message</span>') !!}
                    {!! $errors->first('pic', '<span class="help-block">:message</span>') !!}
                </div
            ></div>

            <div class="card-body card-padding">
                <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    
                    <div class="row">
                        <div class="col-sm-4">                       
                            <div class="input-group">
                                <span class="input-group-addon">First Name:</span>
                                <div class="fg-line">
                                        <input type="text" name="first_name" class="form-control" value="{!! Input::old('first_name', $user->first_name) !!}" />
                                </div>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">Last Name:</span>
                                <div class="fg-line">
                                        <input type="text" name="last_name" class="form-control" value="{!! Input::old('last_name', $user->last_name) !!}" />
                                </div>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">Email:</span>
                                <div class="fg-line">
                                    <input type="text" name="email" class="form-control" value="{!! Input::old('email', $user->email) !!}" />
                                </div>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">Gender:</span>
                                <div class="fg-line select">    
                                    <select class="form-control" name="gender">
                                        <option value="">Select Gender...</option>
                                        <option value="male" @if($user->gender === 'male') selected="selected" @endif >MALE</option>
                                        <option value="female" @if($user->gender === 'female') selected="selected" @endif >FEMALE</option>

                                    </select>
                                </div>
                            </div><br>
                        </div>
                        
                        <div class="col-sm-4">                       
                            <div class="input-group">
                                <span class="input-group-addon">Password:</span>
                                <div class="fg-line">    
                                    <input name="password" type="password" class="form-control" value="{!! Input::old('password') !!}">
                                </div>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">Confirm Password:</span>
                                <div class="fg-line">    
                                    <input name="password_confirm" type="password" class="form-control" value="{!! Input::old('password_confirm') !!}">
                                </div>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">Date of Birth:</span>
                                    <div class="dtp-container dropdown fg-line">
                                    <input type="text" class="form-control date-picker" name="dob" data-toggle="dropdown" value="{!! Input::old('dob') !!}" placeholder="dd-mm-yyyy" aria-expanded="false">
                                </div>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">Country:</span>
                                <div class="fg-line select">    
                                    <select class="form-control" name="country">
                                        <option value="">Select Country...</option>
                                        <option value="AF" @if($user->country == 'AF') selected="selected" @endif >Afghanistan</option>
                                        <option value="AL" @if($user->country == 'AL') selected="selected" @endif >Albania</option>
                                        <option value="DZ" @if($user->country == 'DZ') selected="selected" @endif >Algeria</option>
                                        <option value="AS" @if($user->country == 'AS') selected="selected" @endif >American Samoa</option>
                                        <option value="AD" @if($user->country == 'AD') selected="selected" @endif >Andorra</option>
                                        <option value="AO" @if($user->country == 'AO') selected="selected" @endif >Angola</option>
                                    </select>
                                </div>
                            </div><br />
                        </div>
                        
                        <div class="col-sm-4">                       
                            <div class="input-group">
                                <span class="input-group-addon">State:</span>
                                <div class="fg-line">
                                    <input type="text" name="state" class="form-control" value="{!! Input::old('state') !!}" />
                                </div>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">City:</span>
                                <div class="fg-line">
                                    <input name="city" type="text" class="form-control" value="{!! Input::old('city') !!}" />
                                </div>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">Address</span>
                                <div class="fg-line">
                                    <input name="address" type="text" class="form-control" value="{!! Input::old('address') !!}" />
                                </div>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">Postal/Zip:</span>
                                <div class="fg-line">
                                    <input name="postal" type="text" class="form-control" value="{!! Input::old('postal') !!}" />
                                </div>
                            </div><br>
                            
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                       <div class="input-group">
                            <span class="input-group-addon">Bio:</span>
                            <div class="fg-line">
                                <textarea class="form-control auto-size" placeholder="Brief introduction..." style="overflow: hidden; word-wrap: break-word; height: 32px;"></textarea>
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Group:</span>
                            <div class="fg-line select">    
                                <select class="form-control" name="group[]">
                                    <option value="">Select Group...</option>
                                    @foreach($roles as $group)
                                         <option value="{{ $group->id }}" @if($group->id == $userRoles) selected="selected" @endif >{{ $group->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                     </div><br>
                     <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Activate User:</span>
                            <div class="fg-line toggle-switch">
                                <input id="ts1" name="activate" type="checkbox" hidden="hidden" @if(Input::old('activate')) checked="checked" @endif>
                                <label for="ts1" class="ts-helper"></label>
                            </div>
                        </div>
                      </div>
                      
                    </div>
                    
                    <br />
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        @if($user->pic)
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                            <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" alt="profile pic">
                            </div>
                        @else
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                        @endif
                        <div>
                            <span class="btn btn-info btn-file waves-effect waves-button waves-float">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="pic" />
                            </span>
                            <a href="#" class="btn btn-danger fileinput-exists waves-effect waves-button waves-float" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <a class="btn btn-danger" href="{!! URL::route('users') !!}">
                                @lang('button.cancel')
                            </a>
                            <button type="submit" class="btn btn-success">
                                @lang('button.save')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content"></div>
  </div>
</div>
<script>
$(function () {
	$('body').on('hidden.bs.modal', '.modal', function () {
		$(this).removeData('bs.modal');
	});
});
</script>
<script src="{{ asset('assets/material/vendors/fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset('assets/material/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
@stop