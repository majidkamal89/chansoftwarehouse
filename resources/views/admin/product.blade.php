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
            <h2>Product Management</h2>
        </div>

        <div class="card">
            <div class="card-header text-right">
                <a id="openAddFrom" class="btn btn-primary btn-sm waves-effect waves-button" href="#"> Add New Product</a>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="filters">
                            <th>Title</th>
                            <th>Price</th>
                            <th>Discounted Price</th>
                            <th>Stock</th>
                            <th>Color</th>
                            <th>SKU</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{!! $product->product_title !!}</td>
                            <td>{!! $product->price !!}</td>
                            <td>{!! $product->discounted_price !!}</td>
                            <td>{!! $product->stock !!}</td>
                            <td>{!! $product->product_colors !!}</td>
                            <td>{!! $product->product_sku !!}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('users.show', $product->id) }}">View</a>

                                <a class="btn btn-primary btn-sm" href="{{ route('users.update', $product->id) }}">Edit</a>
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
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="product_delete_confirm_title" aria-hidden="true">
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