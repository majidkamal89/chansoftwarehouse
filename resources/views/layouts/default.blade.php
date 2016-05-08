<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    @section('title')
    | Cmag Admin
    @show
    </title>

    <!-- Vendor CSS -->
    <link href="{{ asset('assets/material/vendors/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/material/vendors/animate-css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/material/vendors/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">

    <!-- CSS -->
    <link href="{{ asset('assets/material/css/app.min.css') }}" rel="stylesheet">
    <!--page level css-->
    @yield('header_styles')
    <!-- end page level css -->
        
    </head>
    <body>
        <header id="header">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
            
                <li class="logo hidden-xs">
                    <a href="{!! URL::to('/') !!}">CMAG Admin</a>
                </li>
                
                <li class="pull-right">
                <ul class="top-menu">
                    <li id="toggle-width">
                        <div class="toggle-switch">
                            <input id="tw-switch" type="checkbox" hidden="hidden">
                            <label for="tw-switch" class="ts-helper"></label>
                        </div>
                    </li>
                    <li id="top-search">
                        <a class="tm-search" href=""></a>
                    </li>
                    </ul>
                </li>
            </ul>
            
            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <input type="text">
                <i id="top-search-close">&times;</i>
            </div>
        </header>
        
        <section id="main">
        {{--*/ $user = Sentinel::getUser(); /*--}} 
            <aside id="sidebar">
                <div class="sidebar-inner">
                    <div class="si-inner">
                        <div class="profile-menu">
                            <a href="">
                                <div class="profile-pic">
                                @if(Sentinel::getUser()->pic)
                                   <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img"/>
                                @else
                                   <img src="{{ asset('assets/material/img/profile-pics/1.jpg') }}" alt="">
                                @endif
                                </div>
                                
                                <div class="profile-info">
                                @if($user->first_name)
                                   {!! $user->first_name !!} {!! $user->last_name !!}
                                @else
                                   Malinda Hollaway
                                 @endif
                                    <i class="md md-arrow-drop-down"></i>
                                </div>
                            </a>
                            
                            <ul class="main-menu">
                                <li>
                                    <a href="{{ URL::route('users.show',Sentinel::getUser()->id) }}"><i class="md md-person"></i> View Profile</a>
                                </li>
                                <li>
                                    <a href=""><i class="md md-settings-input-antenna"></i> Privacy Settings</a>
                                </li>
                                <li>
                                    <a href=""><i class="md md-settings"></i> Settings</a>
                                </li>
                                <li>
                                    <a href="{!! URL::to('logout') !!}"><i class="md md-history"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                        
                        <ul class="main-menu">
                            <li {!! (Request::is('/') ? 'class="active"' : '') !!}>
                                <a href="{!! URL::to('/') !!}"><i class="md md-home"></i> Dashboard</a>
                            </li>
                            <li {!! (Request::is('users') ? 'class="sub-menu active"' : 'class="sub-menu"') !!}>
                                <a href=""><i class="md md-now-widgets"></i> User Management</a>

                                <ul>
                                    <li>
                                        <a {!! (Request::is('users') ? 'class="active"' : '') !!} href="{{ URL::to('users') }}">Users</a>
                                    </li>
                                    <li>
                                        <a {!! (Request::is('users/create') ? 'class="active"' : '') !!} href="{{ URL::to('users/create') }}">Add New User</a>
                                    </li>
                                    <li>
                                        <a {!! (Request::is('/deleted_users') ? 'class="active"' : '') !!} href="{{ URL::to('/deleted_users') }}">Deleted Users</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li {!! (Request::is('groups') ? 'class="sub-menu active"' : 'class="sub-menu"') !!}>
                                <a href=""><i class="md md-now-widgets"></i> Groups Management</a>

                                <ul>
                                    <li>
                                        <a {!! (Request::is('groups') ? 'class="active"' : '') !!} href="{{ URL::to('/groups') }}">Groups</a>
                                    </li>
                                    <li>
                                        <a {!! (Request::is('groups/create') ? 'class="active"' : '') !!} href="{{ URL::to('groups/create') }}">Add New Group</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- Content -->
            @yield('content')

        </section>
        
        <!-- Javascript Libraries -->
        <script src="{{ asset('assets/material/js/jquery-2.1.1.min.js') }}"></script>
        <script src="{{ asset('assets/material/js/bootstrap.min.js') }}"></script>
        
        <script src="{{ asset('assets/material/vendors/flot/jquery.flot.min.js') }}"></script>
        <script src="{{ asset('assets/material/vendors/flot/jquery.flot.resize.min.js') }}"></script>
        <script src="{{ asset('assets/material/vendors/flot/plugins/curvedLines.js') }}"></script>
        <script src="{{ asset('assets/material/vendors/sparklines/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/material/vendors/easypiechart/jquery.easypiechart.min.js') }}"></script>
        
        <script src="{{ asset('assets/material/vendors/fullcalendar/lib/moment.min.js') }}"></script>
        <script src="{{ asset('assets/material/vendors/fullcalendar/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('assets/material/vendors/simpleWeather/jquery.simpleWeather.min.js') }}"></script>
        <script src="{{ asset('assets/material/vendors/auto-size/jquery.autosize.min.js') }}"></script>
        <script src="{{ asset('assets/material/vendors/nicescroll/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('assets/material/vendors/waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/material/vendors/bootstrap-growl/bootstrap-growl.min.js') }}"></script>
        <script src="{{ asset('assets/material/vendors/sweet-alert/sweet-alert.min.js') }}"></script>
        
        <script src="{{ asset('assets/material/js/flot-charts/curved-line-chart.js') }}"></script>
        <script src="{{ asset('assets/material/js/flot-charts/line-chart.js') }}"></script>
        <script src="{{ asset('assets/material/js/charts.js') }}"></script>
        
        <script src="{{ asset('assets/material/js/functions.js') }}"></script>
        <!-- begin page level js -->
        @yield('footer_scripts')
    </body>
  </html>