@extends('layout.master')

@section('title')
    Register
@endsection

@section('content')
    <form id="register">
        <div class="form-group">
            <label>Full name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirm password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('extraJs')
    <script src="{{url('js/register.js')}}"></script>
@endsection
