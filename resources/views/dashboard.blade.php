@extends('base')

@section('content')
<div style="display: grid; place-content: center">
    <div style="width: max-content; display: inline-flex" class="m-5">
        <header class="text-white ">
            <h1> <p class="mr-3">Welcome, <b>{{ Auth::user()->name }}!</b></p></h1>
        </header> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <button class="btn btn-danger" id="logoutButton" data-toggle="modal" data-target="#confirmLogoutModal">Logout</button>
        <div class="modal fade" id="confirmLogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Confirm Logout</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Confirm Logout</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

    </div>

    <div class="mt-10" style="width: 900px;">
        <h1 class="text-white">Dashboard</h1>
        <div class="card">
            <div class="card-header">
                <h2>I am just a header</h2>
            </div>
            <div class="card-body">
                <h5>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit veritatis architecto libero a natus voluptas iste reprehenderit quos soluta in laboriosam voluptatum quis omnis modi consequuntur dignissimos, non recusandae nam.</h5>
            </div>
        </div>
    </div>


</div>
@endsection
@auth

@endauth

