@extends('layout-guest')
@section('title')
Login
@stop
@section('content')
<div class="row d-flex bg-primary justify-content-center align-items-center min-vh-100 p-5 p-md-0">
    <div class="col-12 col-md-6 col-lg-3 card bg-light p-3">
        <form action="{{ route('plogin') }}" method="post">
            @csrf
            <h1 class="text-center mb-3">Login</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @if($errors->any())
            <div class="text-center">
                <small class="text-danger mt-3">{{$errors->first()}}</small>
            </div>
            @endif
            <div>
                Jika tidak punya akun, klik <a href="{{ route('create') }}">disini</a>
            </div>
        </form>
    </div>
</div>
@stop
