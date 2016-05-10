@extends('/layouts/default')

{{-- Page title --}}
@section('title')
Users List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

@stop


{{-- Page content --}}
@section('content')
<section id="content">
    <div class="container">
        <div class="block-header">
            <h2>User Management</h2>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h2>Users List</h2>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="filters">
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User E-mail</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    	<tr>
                            <td>{!! $user->id !!}</td>
                    		<td>{!! $user->first_name !!}</td>
            				<td>{!! $user->last_name !!}</td>
            				<td>{!! $user->email !!}</td>
            				<td>
            					@if($activation = Activation::completed($user))
            						Activated
            					@else
            						Pending
            					@endif
            				</td>
            				<td>{!! $user->created_at->diffForHumans() !!}</td>
            				<td>
                                <a class="btn btn-primary btn-sm" href="{{ route('users.show', $user->id) }}">View</a>

                                <a class="btn btn-primary btn-sm" href="{{ route('users.update', $user->id) }}">Edit</a>
                                
                                @if ((Sentinel::getUser()->id != $user->id) && ($user->id != 1))
                					<a href="{{ route('confirm-delete/user', $user->id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i></a>
                				@endif

                                
                            </td>
            			</tr>
                    @endforeach
                        
                    </tbody>
                </table>
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
@stop