@extends('base')

@section('content')
<div class="container p-5" style="width: 750px">
 <div class="card shadow">
    <div class="card-header">
        <h1 class="text-center">Welcome!</h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="card-body">
        <form action="{{'/'}}" method="POST">
            {{csrf_field()}}
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="" id="email" class="form-control" placeholder="Email">
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="" id="password" class="form-control" placeholder="Password">
            </div>

            <div class="d-flex mt-5">
            <div class="flex-grow-1">
                <a href="{{'/register'}}">Create Account</a>
            </div>
            <button class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
 </div>
</div>
@endsection
