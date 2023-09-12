@extends('base')

@section('content')
<div class="container p-5" style="width: 750px">
    <!-- Display a greeting with the logged-in user's name -->
    @auth
        <p>Welcome, {{ Auth::user()->name }}!</p>
    @endauth

    <!-- Add a logout button -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection
