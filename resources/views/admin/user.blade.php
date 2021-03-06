@extends('admin.layout.master')

@section('title')
    User Manager
@endsection

@section('content')
    <div style="margin-bottom: 50px;">
        <h1>User List</h1>
        <button type="button" class="btn btn-primary create-user">Create new user
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
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="user-list">
            </tbody>
        </table>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="user-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="user-form" method="post">
                        <div class="form-group">
                            Name: <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            Email: <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group password-field">
                            Password: <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group password-field">
                            Confirm Password: <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="custom-select">
                                <option value="{{\App\Enums\Role::USER}}">User</option>
                                <option value="{{\App\Enums\Role::ADMIN}}">Admin</option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="user-form">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('extraJs')
    <script src="{{url('js/admin/user.js')}}"></script>
@endsection
