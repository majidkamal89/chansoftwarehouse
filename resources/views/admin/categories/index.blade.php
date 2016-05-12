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
        <div id="alert_box_success" class="alert alert-success hide" role="alert">Category add/update successfully.</div>
        <div id="delete_alert_box" class="alert alert-success hide" role="alert"></div>
        <div class="card">
            <div class="card-header">
                <h2><small><a href="#" class="btn btn-primary btn-sm" id="openAddFrom"> Add New Category</a></small></h2>
            </div>

            <div class="card-body table-responsive" id="category_list">
                @include('admin/categories/table')
                
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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Category</h4>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body card-padding">
                            <div class="form-group fg-line" id="divCategoryName">
                                <label for="category_title">Are you shure you want to delete it!</label>
                            </div>
                            <button type="button" id="DeleteButton" action="" class="btnDelete btn btn-primary btn-sm m-t-10 waves-effect waves-button waves-float">Delete</button>
                            <button type="button" class="btnCancel btn btn-primary btn-sm m-t-10 waves-effect waves-button waves-float">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
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
                    <div id="alert_box" class="alert alert-danger hass-error hide" role="alert">Please enter required data.</div>
                    <div class="card-body card-padding">
                        <form role="form" method="post" id="categoryForm" action="{{ URL::route('createCategory') }}">
                           <input type="hidden" name="_token" value="{!! csrf_token() !!}" /> 
                            <div class="form-group fg-line" id="divCategoryName">
                                <label for="category_title">Category Name</label>
                                <input type="text" class="form-control input-sm" id="category_title" name="category_title">
                            </div>
                            <div class="checkbox" id="checkboxStatus">
                                <label>
                                    <input type="checkbox" name="is_removed" id="is_removed">
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
<div class="modal fade" id="edit_category" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div id="edit_alert_box" class="alert alert-danger hass-error hide" role="alert">Please enter required data.</div>
                    <div class="card-body card-padding">
                        <form role="form" method="post" id="edit_category_form" action="{{ URL::route('createCategory') }}">
                           <input type="hidden" name="_token" value="{!! csrf_token() !!}" /> 
                           <input type="hidden" name="edit_id" id="edit_id" value="" /> 
                            <div class="form-group fg-line" id="divCategoryName">
                                <label for="category_title">Category Name</label>
                                <input type="text" class="form-control input-sm" id="edit_category_title" name="category_title" value="">
                            </div>
                            <div class="checkbox" id="checkboxStatus">
                                <label>
                                    <input type="checkbox" name="is_removed" id="edit_is_removed">
                                    <i class="input-helper"></i>
                                    Enable/Disable
                                </label>
                            </div>
                            
                            <button type="button" id="btn_edit_category" class="btn btn-primary btn-sm m-t-10 waves-effect waves-button waves-float">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function (){
        // $("#alert_box_success").addClass('hide');
    });
    $(document).ready(function () {
        $(document).on('click', '#openAddFrom', function(e){
            $("#alert_box").addClass('hide');
            $("#add_category").modal('show');
            e.preventDefault();
            $("#category_title").val('');
            $("#is_removed").prop('checked',false);
            $("#divCategoryName").removeClass('');
            $("#checkboxStatus").removeClass('');
        });

        $(document).on('click', '.EditRecord', function (e){
            id = $(this).attr('id');
            $("#edit_id").val('');
            $("#edit_id").val(id);
            $("#edit_category").modal('show');
            var txt_category_title = $("#txt_category_title_"+id).html();
            $("#edit_category_title").val(txt_category_title);
            var status = $("#status_"+id).html();
            if(status == "Active")
                $("#edit_is_removed").prop('checked',true);
            else
                $("#edit_is_removed").prop('checked',false);            
            e.preventDefault();
            //alert(id);
        });

        $(document).on('click', '#save_category', function() {
            var formData = $("#categoryForm").serialize();
            var postUrl = $("#categoryForm").attr('action');
            $.ajax({
                url: postUrl,
                type: 'POST',
                dataType:"json",
                data: formData,
                success: function(response){
                    if(response == 0){
                        $("#alert_box").removeClass('hide');
                        $("#divCategoryName").addClass('hass-error');
                        $("#checkboxStatus").addClass('hass-error');
                    }
                    else
                    {
                        $("#alert_box_success").removeClass('hide');
                        $('#alert_box_success').delay(2000).fadeOut();
                        $("#add_category").modal('hide');
                        loadPage('category_list');
                    }
                },
            });
            
        });

        // Edit category
         $(document).on('click', '#btn_edit_category', function() {
            var formData = $("#edit_category_form").serialize();
            var postUrl = $("#edit_category_form").attr('action');
            $.ajax({
                url: postUrl,
                type: 'POST',
                data: formData,
                success: function(response){
                    var obj = jQuery.parseJSON( response );
                    //console.log(obj.category_title); return false;
                    $("#txt_category_title_"+obj.edit_id).html(obj.category_title);
                    if(obj.is_removed == 1)
                        $("#status_"+obj.edit_id).html('Active');
                    else
                        $("#status_"+obj.edit_id).html('InActive');
                    $("#alert_box_success").removeClass('hide');
                    $('#alert_box_success').delay(2000).fadeOut();
                    $("#edit_category").modal('hide');
                    loadPage('category_list');
                },
            });
            
        });

         // Delete Category
         $(document).on('click', '.DeleteDialogConfirm', function (e){
            id = $(this).attr('id');
            action = $(this).attr('action');
            $("#DeleteButton").attr('');
            $("#DeleteButton").attr('action',action);
            $("#delete_confirm").modal('show');
            e.preventDefault();
        });

         $(document).on('click', '.btnCancel', function (e){
            $("#delete_confirm").modal('hide');
            e.preventDefault();
        });

        $(document).on('click', '.btnDelete', function (e){
            //id = $(".DeleteDialogConfirm").attr('id');
            var postUrl = $(".btnDelete").attr('action');
            $.ajax({
                url: postUrl,
                type: 'GET',
                dataType:"json",
                success: function(response){
                    $("#delete_confirm").modal('hide');
                    $("#row_"+response).remove();
                    $("#delete_alert_box").removeClass('hide');
                    $("#delete_alert_box").html('');
                    $("#delete_alert_box").html('Category deleted successfully.');
                    $('#delete_alert_box').delay(2000).fadeOut();
                    loadPage('category_list');
                },
            });
            e.preventDefault();
        }); 
    });
function loadPage(id){
    $.ajax({
        url: '/categories/getData',
        type: 'GET',
        dataType:"json",
        success: function(response){
            $("#"+id).html(response);
        },
    });
}
</script>
<style type="text/css">
body,
.modal-open .page-container,
.modal-open .page-container .navbar-fixed-top,
.modal-open .modal-container {
    overflow-y: scroll;
}

@media (max-width: 979px) {
    .modal-open .page-container .navbar-fixed-top{
        overflow-y: visible;
    }
</style>
@stop
