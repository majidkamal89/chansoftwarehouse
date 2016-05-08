@extends('/layouts/default')

{{-- Page title --}}
@section('title')
View User Details
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!-- Vendor CSS -->
<link href="{{ asset('assets/material/vendors/animate-css/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/material/vendors/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">
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
            <h2>{!! $user->first_name.' '. $user->last_name !!} <small>Web/UI Developer, Dubai, United Arab Emirates</small></h2>
        </div>
        
        <div class="card">
            
            <div class="card" id="profile-main">
            <div class="pm-overview c-overflow" tabindex="4" style="overflow: hidden; outline: none;">
            <div class="pmo-pic">
            <div class="p-relative">
            <a href="">
                <img class="img-responsive" src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt=""> 
            </a>
            
            <div class="dropdown pmop-message">
                <a data-toggle="dropdown" href="" class="btn bgm-white btn-float z-depth-1 waves-effect waves-button waves-float">
                    <i class="md md-message"></i>
                </a>
                
                <div class="dropdown-menu">
                    <textarea placeholder="Write something..."></textarea>
                    
                    <button class="btn bgm-green btn-icon waves-effect waves-button waves-float"><i class="md md-send"></i></button>
                </div>
            </div>
            
            <a href="" class="pmop-edit">
                <i class="md md-camera-alt"></i> <span class="hidden-xs">Update Profile Picture</span>
            </a>
            </div>
            
            
            
            </div>
            
            <div class="pmo-block pmo-contact hidden-xs">
            <h2>Contact</h2>
            
            <ul>
            <li><i class="md md-phone"></i> 00971 12345678 9</li>
            <li><i class="md md-email"></i> malinda-h@gmail.com</li>
            <li><i class="socicon socicon-skype"></i> malinda.hollaway</li>
            <li><i class="socicon socicon-twitter"></i> @malinda (twitter.com/malinda)</li>
            <li>
                <i class="md md-location-on"></i>
                <address class="m-b-0">
                    10098 ABC Towers, <br>
                    Dubai Silicon Oasis, Dubai, <br>
                    United Arab Emirates
                </address>
            </li>
            </ul>
            </div>
            
            
            </div>
            
            <div class="pm-body clearfix">
            <ul class="tab-nav tn-justified" tabindex="1" style="overflow: hidden; outline: none;">
            <li class="active waves-effect"><a href="javascript:;">About</a></li>
            <li class="waves-effect"></li>
            <li class="waves-effect"></li>
            <li class="waves-effect"></li>
            <li class="waves-effect"></li>
            </ul>
            
            
            <div class="pmb-block">
            <div class="pmbb-header">
            <h2><i class="md md-equalizer m-r-5"></i> Summary</h2>
            
            <ul class="actions">
                <li class="dropdown">
                    <a href="" data-toggle="dropdown">
                        <i class="md md-more-vert"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a data-pmb-action="edit" href="">Edit</a>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
            <div class="pmbb-body p-l-30">
            <div class="pmbb-view">
                Sed eu est vulputate, fringilla ligula ac, maximus arcu. Donec sed felis vel magna mattis ornare ut non turpis. Sed id arcu elit. Sed nec sagittis tortor. Mauris ante urna, ornare sit amet mollis eu, aliquet ac ligula. Nullam dolor metus, suscipit ac imperdiet nec, consectetur sed ex. Sed cursus porttitor leo.
            </div>
            
            <div class="pmbb-edit">
                <div class="fg-line">
                    <textarea class="form-control" rows="5" placeholder="Summary...">Sed eu est vulputate, fringilla ligula ac, maximus arcu. Donec sed felis vel magna mattis ornare ut non turpis. Sed id arcu elit. Sed nec sagittis tortor. Mauris ante urna, ornare sit amet mollis eu, aliquet ac ligula. Nullam dolor metus, suscipit ac imperdiet nec, consectetur sed ex. Sed cursus porttitor leo.</textarea>
                </div>
                <div class="m-t-10">
                    <button class="btn btn-primary btn-sm waves-effect waves-button waves-float">Save</button>
                    <button data-pmb-action="reset" class="btn btn-link btn-sm waves-effect waves-button waves-float">Cancel</button>
                </div>
            </div>
            
            </div>
            </div>
            
            <div class="pmb-block">
            <div class="pmbb-header">
            <h2><i class="md md-person m-r-5"></i> Basic Information</h2>
            
            <ul class="actions">
                <li class="dropdown">
                    <a href="" data-toggle="dropdown">
                        <i class="md md-more-vert"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a data-pmb-action="edit" href="">Edit</a>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
            <div class="pmbb-body p-l-30">
            <div class="pmbb-view">
                <dl class="dl-horizontal">
                    <dt>Full Name</dt>
                    <dd>{!! $user->first_name.' '.$user->last_name !!}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Gender</dt>
                    <dd>{!! $user->gender !!}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Birthday</dt>
                    <dd>{!! date('F d, Y', strtotime($user->dob)) !!}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Address</dt>
                    <dd>{!! $user->address !!}</dd>
                </dl>
            </div>
            
            <div class="pmbb-edit">
                <dl class="dl-horizontal">
            
                    <dt class="p-t-10">Full Name</dt>
                    <dd>
                        <div class="fg-line">
                            <input type="text" class="form-control" placeholder="eg. Mallinda Hollaway">
                        </div>
                        
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Gender</dt>
                    <dd>
                        <div class="fg-line">
                            <select class="form-control">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Birthday</dt>
                    <dd>
                        <div class="dtp-container dropdown fg-line">
                            <input type="text" class="form-control date-picker" data-toggle="dropdown" placeholder="Click here...">
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Martial Status</dt>
                    <dd>
                        <div class="fg-line">
                            <select class="form-control">
                                <option>Single</option>
                                <option>Married</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </dd>
                </dl>
                
                <div class="m-t-30">
                    <button class="btn btn-primary btn-sm waves-effect waves-button waves-float">Save</button>
                    <button data-pmb-action="reset" class="btn btn-link btn-sm waves-effect waves-button waves-float">Cancel</button>
                </div>
            </div>
            </div>
            </div>
            
            
            <div class="pmb-block">
            <div class="pmbb-header">
            <h2><i class="md md-phone m-r-5"></i> Contact Information</h2>
            
            <ul class="actions">
                <li class="dropdown">
                    <a href="" data-toggle="dropdown">
                        <i class="md md-more-vert"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a data-pmb-action="edit" href="">Edit</a>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
            <div class="pmbb-body p-l-30">
            <div class="pmbb-view">
                <dl class="dl-horizontal">
                    <dt>Mobile Phone</dt>
                    <dd>00971 12345678 9</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Email Address</dt>
                    <dd>malinda.h@gmail.com</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Twitter</dt>
                    <dd>@malinda</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Skype</dt>
                    <dd>malinda.hollaway</dd>
                </dl>
            </div>
            
            <div class="pmbb-edit">
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Mobile Phone</dt>
                    <dd>
                        <div class="fg-line">
                            <input type="text" class="form-control" placeholder="eg. 00971 12345678 9">
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Email Address</dt>
                    <dd>
                        <div class="fg-line">
                            <input type="email" class="form-control" placeholder="eg. malinda.h@gmail.com">
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Twitter</dt>
                    <dd>
                        <div class="fg-line">
                            <input type="text" class="form-control" placeholder="eg. @malinda">
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Skype</dt>
                    <dd>
                        <div class="fg-line">
                            <input type="text" class="form-control" placeholder="eg. malinda.hollaway">
                        </div>
                    </dd>
                </dl>
                
                <div class="m-t-30">
                    <button class="btn btn-primary btn-sm waves-effect waves-button waves-float">Save</button>
                    <button data-pmb-action="reset" class="btn btn-link btn-sm waves-effect waves-button waves-float">Cancel</button>
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

@stop