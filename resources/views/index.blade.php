@extends('/layouts/default')

{{-- Page title --}}
@section('title')
CMAG Admin
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
            <h2>Dashboard</h2>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h2>Dashboard Data</h2>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Nickname</th>
                    </tr>
                    </thead>
                    
                </table>
            </div>
        </div>
    </div>
</section>
        
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop
