@extends('base')

@section('content')
<div style="display: grid; place-content: center">
    <div style="width: max-content; display: inline-flex" class="m-5">
        <header class="text-white ">
            <h1> <p class="mr-3">Welcome, <b>{{ Auth::user()->name }}!</b></p></h1>
        </header> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <button class="btn btn-danger" id="logoutButton" data-toggle="modal" data-target="#confirmLogoutModal"> Logout</button>
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

    <div class="mt-10" style="width: 1000px;">
        <h1 class="text-white"><i class="fa-solid fa-shop"></i> FL Store</h1>
        <div class="card">
            <div class="card-header">
                <h2>Plugins</h2>
            </div>
            <div class="card-body">
                <h5>
                                    <!-- Button trigger modal -->
                <div class="text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i> Add Plugins
                    </button>
                </div>

                <!-- Modal -->
                <div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>Create Plugin</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                            <form method="POST" action="{{ route('plugins.store') }}">
                                @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea name="description" id="description" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="number" name="price" id="price" class="form-control" required>
                                    </div>


                                    {{-- <div class="">
                                        <label class="form-label"><i class="fa-solid fa-shield-halved"></i> Select Supported Daws:</label>
                                        <input class="form-control" type="text" name="selectedSoftware" id="selectedSoftware">

                                    <div style="display: flex; flex-wrap: wrap;">
                                        <div class="form-check m-3">
                                            <input class="form-check-input" type="checkbox" name="software" value="FL Studio" id="flstudio">
                                            <label class="form-check-label" for="flstudio">FL Studio</label>
                                        </div>

                                        <div class="form-check m-3">
                                            <input class="form-check-input" type="checkbox" name="software" value="Pro Tools" id="protools">
                                            <label class="form-check-label" for="protools">Pro Tools</label>
                                        </div>

                                        <div class="form-check m-3">
                                            <input class="form-check-input" type="checkbox" name="software" value="Ableton Live" id="ableton">
                                            <label class="form-check-label" for="ableton">Ableton Live</label>
                                        </div>

                                        <div class="form-check m-3">
                                            <input class="form-check-input" type="checkbox" name="software" value="Logic Pro" id="logicpro">
                                            <label class="form-check-label" for="logicpro">Logic Pro</label>
                                        </div>

                                        <div class="form-check m-3">
                                            <input class="form-check-input" type="checkbox" name="software" value="Audacity" id="audacity">
                                            <label class="form-check-label" for="audacity">Audacity</label>
                                        </div>

                                        <div class="form-check m-3">
                                            <input class="form-check-input" type="checkbox" name="software" value="Cubase" id="cubase">
                                            <label class="form-check-label" for="cubase">Cubase</label>
                                        </div>

                                        <div class="form-check m-3">
                                            <input class="form-check-input" type="checkbox" name="software" value="Reaper" id="reaper">
                                            <label class="form-check-label" for="reaper">Reaper</label>
                                        </div>
                                    </div>

                                    </div> --}}
                                </div>
                            </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>

                            </div>
                        </div>
                        </div>
                    </form>
                </div>


                </h5>
            </div>
        </div>
    </div>
</div>
<style>
    .software-checkboxes {
        display: flex;
        flex-direction: column;
        margin: 20px;
    }
    .form-check {
        display: flex;
        align-items: center;
    }
</style>
<script>
    // Get the text input and all the checkboxes
    const selectedSoftwareInput = document.getElementById("selectedSoftware");
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="software"]');

    // Add an event listener to each checkbox
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", updateSelectedSoftware);
    });

    // Function to update the text input with selected software
    function updateSelectedSoftware() {
        const selectedSoftware = Array.from(checkboxes)
            .filter((checkbox) => checkbox.checked)
            .map((checkbox) => checkbox.value)
            .join(", ");
        selectedSoftwareInput.value = selectedSoftware;
    }
</script>

@endsection
@auth

@endauth

