@extends('/layouts/default')

{{-- Web site Title --}}
@section('title')
Categories
@parent
@stop

@section('header_styles')
<style type="text/css">
.action-css { 
    width: 15%;
}
</style>    

@stop


{{-- Content --}}
@section('content')
<section id="content">
    <div class="container">
        <div class="block-header">
            <h2>Categories</h2>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h2><small><a href="#" class="btn btn-primary btn-sm" id="openAddFrom"> Add New Category</a></small></h2>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th class="action-css">Action</th>
                        </tr>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                       <td>1</td>
                       <td>Shoes</td>
                       <td>Active</td>
                       <td>
                          <button class="btn btn-primary btn-sm">Edit</button>
                          <button class="btn btn-danger btn-sm">Delete</button>
                       </td>
                    </tr>      
                    </tbody>
                </table>
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


<div class="modal fade" id="add_category" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Category</h4>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body card-padding">
                        <form role="form" method="post" id="categoryForm" action="{{ URL::route('createCategory') }}">
                           <input type="hidden" name="_token" value="{!! csrf_token() !!}" /> 
                            <div class="form-group fg-line">
                                <label for="category_title">Category Name</label>
                                <input type="text" class="form-control input-sm" id="category_title" name="category_title">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_removed">
                                    <i class="input-helper"></i>
                                    Enable/Disable
                                </label>
                            </div>
                            
                            <button type="button" id="save_category" class="btn btn-primary btn-sm m-t-10 waves-effect waves-button waves-float">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('click', '#openAddFrom', function(e){
            $("#add_category").modal('show');
            e.preventDefault();
        });

        $(document).on('click', '#save_category', function() {
            var formData = $("#categoryForm").serialize();
            var postUrl = $("#categoryForm").attr('action');
            $.ajax({
                url: postUrl,
                type: 'POST',
                data: formData,
                success: function(response){
                    alert(response);
                },
            });
        });
    });
</script>
@stop
