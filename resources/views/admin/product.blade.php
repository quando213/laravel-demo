@extends('admin.layout.master')

@section('title')
    Product Manager
@endsection

@section('content')
    <div style="margin-bottom: 50px;">
        <h1>Product List</h1>
        <button type="button" class="btn btn-primary create-product">Create new product
        </button>
    </div>

    <div class="my-5">
        <div class="form-group">
            <label>Search</label>
            <input type="text" class="form-control" name="keyword">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="product-list">
            </tbody>
        </table>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="product-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="product-form" method="post">
                        <div class="form-group">
                            Name: <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            Price: <input type="number" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            Description: <textarea name="description" rows="5" class="form-control"></textarea>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="product-form">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('extraJs')
    <script src="{{url('js/admin/product.js')}}"></script>
@endsection
