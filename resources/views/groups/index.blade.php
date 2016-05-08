@extends('/layouts/default')

{{-- Web site Title --}}
@section('title')
@lang('groups/title.management')
@parent
@stop

{{-- Content --}}
@section('content')
<section id="content">
    <div class="container">
        <div class="block-header">
            <h2>@lang('groups/title.management')</h2>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h2><small><a href="{{ route('create/group') }}" class="btn btn-primary btn-sm"> @lang('button.create')</a></small></h2>
                
            </div>

            <div class="card-body table-responsive">
             @if ($roles->count() >= 1)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <tr>
                            <th>@lang('groups/table.id')</th>
                            <th>@lang('groups/table.name')</th>
                            <th>@lang('groups/table.users')</th>
                            <th>@lang('groups/table.created_at')</th>
                            <th>@lang('groups/table.actions')</th>
                        </tr>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($roles as $role)
                        <tr>
                            <td>{!! $role->id !!}</td>
                            <td>{!! $role->name !!}</td>
                            <td>{!! $role->users()->count() !!}</td>
                            <td>{!! $role->created_at->diffForHumans() !!}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('update/group', $role->id) }}">
                                        Edit
                                    </a>
                                    <!-- let's not delete 'Admin' group by accident -->
                                    @if ($role->id !== 1)
                                        @if($role->users()->count())
                                            <a href="#" data-toggle="modal" data-target="#users_exists" data-name="{!! $role->name !!}" class="users_exists">
                                                <i class="livicon" data-name="warning-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="users exists"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('confirm-delete/group', $role->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete group"></i>
                                            </a>
                                        @endif

                                    @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    @lang('general.noresults')
                @endif
            </div>
        </div>
    </div>
</section>

@stop

{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<div class="modal fade" id="users_exists" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                @lang('groups/message.users_exists')
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});
    $(document).on("click", ".users_exists", function () {

        var group_name = $(this).data('name');
        $(".modal-header h4").text( group_name+" Group" );
    });</script>
@stop
