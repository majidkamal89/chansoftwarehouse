@extends('/layouts/default')

{{-- Page title --}}
@section('title')
Deleted users
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
            <h2>Deleted users</h2>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h2>Deleted Users List</h2>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="filters">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User E-mail</th>
                        <th>Created At</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($users) > 0)
                    @foreach ($users as $user)
                        <tr>
                            <td>{!! $user->first_name !!}</td>
                            <td>{!! $user->last_name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td>{!! $user->created_at->diffForHumans() !!}</td>
                            <td>
                                <a href="{{ route('restore/user', $user->id) }}"><i class="livicon" data-name="user-flag" data-c="#6CC66C" data-hc="#6CC66C" data-size="18"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr><td colspan="5">@lang('general.noresults')</td></tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>       
@stop

{{-- page level scripts --}}
@section("footer_scripts")
@stop