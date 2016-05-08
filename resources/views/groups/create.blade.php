@extends('/layouts/default')

{{-- Web site Title --}}
@section('title')
@lang('groups/title.create')
@parent
@stop

{{-- Content --}}
@section('content')
<section id="content">
    <div class="container">
        <div class="block-header">
            <h2>@lang('groups/title.create')</h2>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h2>@lang('groups/title.create')</h2>
                
            </div>

            <div class="card-body card-padding">
             {!! $errors->first('slug', '<span class="help-block">Another role with same slug exists, please choose another name</span> ') !!}
                <form class="form-horizontal" role="form" method="post" action="">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group {{ $errors->
                        first('name', 'has-error') }}">
                        <label for="title" class="col-sm-2 control-label">
                            @lang('groups/form.name')
                        </label>
                        <div class="col-sm-5">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Group Name" value="{!! Input::old('name') !!}">
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('name', '<span class="help-block">:message</span> ') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                            <a class="btn btn-danger" href="{{ route('groups') }}">
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
