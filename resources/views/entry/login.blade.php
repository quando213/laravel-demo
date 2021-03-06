@extends('layout.master')

@section('title')
    Login
@endsection

@section('content')
    <form id="login">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection

@section('extraJs')
    <script src="{{url('js/login.js')}}"></script>
@endsection
