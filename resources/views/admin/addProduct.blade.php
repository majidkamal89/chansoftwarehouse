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
            <h2>Add Product</h2>
        </div>
        <div class="card">
            <div class="card-header">
                <!-- errors -->
                <div class="has-error">
                    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                    {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
                    {!! $errors->first('discounted_price', '<span class="help-block">:message</span>') !!}
                    {!! $errors->first('stock', '<span class="help-block">:message</span>') !!}
                </div
                ></div>
            <div class="card-body card-padding">
                <form method="POST" class="form-horizontal" id="saveProduct" role="form" enctype="multipart/form-data">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="row">
                        <div class="col-sm-4">                       
                            <div class="input-group">
                                <span class="input-group-addon">Product Title:</span>
                                <div class="fg-line">
                                    <input type="text" name="product_title" class="form-control" value="{!! Input::old('product_title') !!}" />
                                </div>
                            </div><br>
                        </div>
                        <div class="col-sm-4">                       
                            <div class="input-group">
                                <span class="input-group-addon">Price:</span>
                                <div class="fg-line">
                                    <input type="text" name="price" class="form-control" value="{!! Input::old('price') !!}" />
                                </div>
                            </div><br>
                        </div>

                        <div class="col-sm-4">                       
                            <div class="input-group">
                                <span class="input-group-addon">Discounted Price:</span>
                                <div class="fg-line">
                                    <input type="text" name="discounted_price" class="form-control" value="{!! Input::old('discounted_price') !!}" />
                                </div>
                            </div><br>
                        </div>
                    </div>
                    <div class="row m-t-25">
                    <h5>Please Select images for Product:</h5>
                    </div>
                    <div class="row text-center">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                        <div>
                            <span class="btn btn-info btn-file waves-effect waves-button waves-float">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="image1" />
                            </span>
                            <a href="#" class="btn btn-danger fileinput-exists waves-effect waves-button waves-float" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                        <div>
                            <span class="btn btn-info btn-file waves-effect waves-button waves-float">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="image2" />
                            </span>
                            <a href="#" class="btn btn-danger fileinput-exists waves-effect waves-button waves-float" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                        <div>
                            <span class="btn btn-info btn-file waves-effect waves-button waves-float">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="image3" />
                            </span>
                            <a href="#" class="btn btn-danger fileinput-exists waves-effect waves-button waves-float" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                        <div>
                            <span class="btn btn-info btn-file waves-effect waves-button waves-float">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="image4" />
                            </span>
                            <a href="#" class="btn btn-danger fileinput-exists waves-effect waves-button waves-float" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="col-sm-offset-8 col-sm-4">
                            <a class="btn btn-success saveProduct" href="javascript:">Save</a>
                            <a class="btn btn-danger" href="{!! URL::route('users') !!}">
                                @lang('button.cancel')
                            </a>
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
<script src="{{ asset('assets/material/vendors/fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset('assets/material/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
@stop