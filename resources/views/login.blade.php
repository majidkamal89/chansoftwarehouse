<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cmag.pk</title>
        
        <!-- Vendor CSS -->
        <link href="{{ asset('assets/material/vendors/animate-css/animate.min.css') }}" rel="stylesheet">
            
        <!-- CSS -->
        <link href="{{ asset('assets/material/css/app.min.css') }}" rel="stylesheet">
    </head>
    <body class="login-content">
    <!--  -->
        <!-- Login -->
        <div class="lc-block toggled" id="l-login">
        @include('notifications')
        <form action="{{ route('signin') }}" autocomplete="on" method="post" role="form" id="singinForm">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-person"></i></span>
                <div class="fg-line">
                    <input type="text" name="email" class="form-control required" value="{!! Input::old('email') !!}" placeholder="Username">
                </div>
            </div>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-accessibility"></i></span>
                <div class="fg-line">
                    <input type="password" name="password" class="form-control required" placeholder="Password">
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    <i class="input-helper"></i>
                    Keep me signed in
                </label>
            </div>
            <div class="m-b-20 text-left">
                {!! $errors->first('email', '<span class="help-block c-red">:message</span>') !!}
                {!! $errors->first('password', '<span class="help-block c-red">:message</span>') !!}
            </div>
            
            <a href="#" class="btn btn-login btn-danger btn-float submit"><i class="md md-arrow-forward"></i></a>
            
            <ul class="login-navigation">
                <!-- <li data-block="#l-register" class="bgm-red">Register</li> -->
                <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
            </ul>
        </form>
        </div>
        
        <!-- Register -->
        <div class="lc-block" id="l-register">
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-person"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Username">
                </div>
            </div>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-mail"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Email Address">
                </div>
            </div>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-accessibility"></i></span>
                <div class="fg-line">
                    <input type="password" class="form-control" placeholder="Password">
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    <i class="input-helper"></i>
                    Accept the license agreement
                </label>
            </div>
            
            <a href="" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></a>
            
            <ul class="login-navigation">
                <li data-block="#l-login" class="bgm-green">Login</li>
                <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
            </ul>
        </div>
        
        <!-- Forgot Password -->
        <div class="lc-block" id="l-forget-password">
        <form action="{{ route('forgot-password') }}" autocomplete="on" method="post" role="form" id="forgetPass">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <p class="text-left">Enter your email address below and we'll send a special reset password link to your inbox.</p>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-email"></i></span>
                <div class="fg-line">
                    <input type="email" id="email" name="email" class="form-control" placeholder="your@mail.com" value="{!! Input::old('email') !!}">
                </div>
            </div>
            
            <a href="#" class="btn btn-login btn-danger btn-float forget-password"><i class="md md-arrow-forward"></i></a>
            
            <ul class="login-navigation">
                <li data-block="#l-login" class="bgm-green">Login</li>
                <!-- <li data-block="#l-register" class="bgm-red">Register</li> -->
            </ul>
        </form>
        </div>
        
        <!-- Javascript Libraries -->
        <script src="{{ asset('assets/material/js/jquery-2.1.1.min.js') }}"></script>
        <script src="{{ asset('assets/material/js/bootstrap.min.js') }}"></script>
        
        <script src="{{ asset('assets/material/vendors/waves/waves.min.js') }}"></script>
        
        <script src="{{ asset('assets/material/js/functions.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '.submit', function(e) {
                    $("#singinForm").submit();
                    e.preventDefault();
                });
                $(document).on('click', '.forget-password', function(e) {
                    $("#forgetPass").submit();
                    e.preventDefault();
                });
            });
        </script>
    </body>
</html>