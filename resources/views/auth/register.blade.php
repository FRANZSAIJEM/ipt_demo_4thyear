@extends('base')

@section('content')
<div class="container p-5" style="width: 750px">
 <div class="card shadow">
    <div class="card-header">
        <h1 class="text-center">Welcome!</h1>

    </div>
    <div class="card-body">
        <form action="{{'/register'}}" method="POST">
            {{csrf_field()}}
            <div class="mb-3">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Full Name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Password">
                @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>



            <div class="d-flex mt-5">
                <div class="flex-grow-1">
                    <a href="{{'/'}}">Already have an acount</a>
                </div>
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
 </div>
</div>
@endsection
