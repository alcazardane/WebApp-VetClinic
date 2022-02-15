@extends('layouts.layout')

@section('_content')
<div class="container-fluid p-5 align-items-center">
    <div class="row m-5 justify-content-between mt-4">
        <p class="display-6 mb-5">My Profile</p>
    </div>
    
    <div class="row m-5 d-flex justify-content-center">
        <div class="col-lg-3">
            <img
            {{-- /storage/profileimage/{{ Auth::user()->profileimage }} --}}
                src="{{ URL::to('storage/'.Auth::user()->profileimage) }}"
                class="rounded-circle img-fluid"
                height="35%"
                alt="Avatar"
                loading="lazy"
            />
        </div>

        <div class="col-lg-7 mt-4">
            <ul class="list-group list-group-flush">
                <li style="background-color: transparent" class="list-group-item d-flex justify-content-between align-items-start">
                    <b>Name:</b> {{ Auth::user()->name }}
                    <a data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="color: #a8a8a8; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                        Edit
                    </a>
                </li>
                <li style="background-color: transparent" class="list-group-item d-flex justify-content-between align-items-start">
                    <b>Email:</b> {{ Auth::user()->email }}
                    <a data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="color: #a8a8a8; text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                        Edit
                    </a>
                </li>
                <li style="background-color: transparent" class="list-group-item d-flex justify-content-between align-items-start">
                    <b>User Type:</b> {{ Auth::user()->user_type }}
                </li>
                <li style="background-color: transparent" class="list-group-item d-flex justify-content-between align-items-start">
                    <b>Password:</b>
                    <a data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="color: #a8a8a8; text-decoration: none;">
                        Change Password
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row m-5 d-flex justify-content-center">
        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <form method="POST" action="{{ route('accprofile.update', Auth::user()->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 ">
                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label for="_name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="_name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col mt-3 mb-3">
                                <label for="_email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="_email" placeholder="Last Name" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col">
                                <label for="formFile" class="form-label">Profile Image</label>
                                <input class="form-control" name="profileimage" type="file" id="formFile" value="{{ Auth::user()->profileimage }}">
                            </div>
                        </div>
                    </div>
    
                    <div class="mb-3 d-grid gap-2">
                        <button class="btn btn-success" type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
    
            <div class="collapse multi-collapse" id="multiCollapseExample2">
                <form method="POST" action="profile-pass/{{ Auth::user()->id }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 ">
                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
    
                    <div class="mb-3 d-grid gap-2">
                        <button class="btn btn-success" type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

    <div class="row m-5 d-flex justify-content-center">
        <p class="display-6">My Pet/s</p>
        <div class="col">
            <a href="{{ route('petprofile.create') }}" type="button" class="btn btn-success">Add a Pet</a>
        </div>
    </div>

    <div class="row m-5 d-flex justify-content-start">
        @if (count($petprofile) >= 1)
            @foreach ($petprofile as $petprofile)
                <div class="col-md-4 col-xl-4">
                    <div class="card mb-3 bg-white border-light shadow-sm" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 mt-3">
                                <img src="/storage/profileimage/{{ $petprofile->profilepicture }}" class="img-thumbnail border-white" alt="Pet Profile Picture" loading="lazy">
                            </div>
                        
                            <div class="col-md-8 col-xl-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $petprofile->petname }}</h5>
                                    <p class="card-text">{{ $petprofile->petspecies }}</p>
                                    <p class="card-text">{{ $petprofile->petbreed }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $petprofile->petgender }}</small></p>
                                    <div class="btn-group dropend">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                          Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('petprofile.show', $petprofile->id) }}" class="dropdown-item">View</a>
                                            </li>
                                            <li>
                                                <a 
                                                    class="dropdown-item"
                                                    data-bs-toggle="modal" 
                                                    href="#request_myprofile" 
                                                    data-bs-owneremail={{ Auth::user()->email }}
                                                    data-bs-petname={{ $petprofile->petname }}
                                                    >
                                                    Request
                                                </a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="modal" href="#removeModal{{ $petprofile->id }}" class="dropdown-item">Remove</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('petprofile.edit', $petprofile->id) }}" class="dropdown-item">Edit</a>
                                            </li>
                                        </ul>
                                      </div>
                                </div>
                            </div>

                        </div>
                    </div>
                
                    <!--Request Modal-->
                        <div class="modal fade" id="request_myprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Request a Record</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('reqrecords.make', Auth::user()->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="_req" class="col-form-label">Request a record for..</label>
                                                <select name="recreq" class="form-select form-select-lg mb-3" aria-label="form-select-lg example" id="_req">
                                                    <option value="consultation">Consultation Records</option>
                                                    <option value="grooming">Grooming Records</option>
                                                    <option value="health">Health Records</option>
                                                    <option value="surgical">Surgical Records</option>
                                                    <option value="vax">Vaccine Records</option>
                                                </select>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <label for="_petname" class="col-form-label">Pet Name</label>
                                                <input type="text" name="petname" id="_petname" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="_owneremail" class="col-form-label">Owner Email</label>
                                                <input type="text" name="owneremail" id="_owneremail" class="form-control">
                                            </div>
                                        
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Send Request</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <script>
                            var exampleModal = document.getElementById('request_myprofile')
                            exampleModal.addEventListener('show.bs.modal', function (event) {
                                // Button that triggered the modal
                                var button = event.relatedTarget
                                // Extract info from data-bs-* attributes
                                var recipient = button.getAttribute('data-bs-owneremail')
                                var recipient2 = button.getAttribute('data-bs-petname')
                                // If necessary, you could initiate an AJAX request here
                                // and then do the updating in a callback.
                                //
                                // Update the modal's content.
                                var modalTitle = exampleModal.querySelector('.modal-title')
                                var modalBodyInput = exampleModal.querySelector('.modal-body input')
                                var owneremail = exampleModal.querySelector('#_owneremail');
                                var petname = exampleModal.querySelector('#_petname');
                            
                                owneremail.value = recipient;
                                petname.value = recipient2;
                            })
                        </script>
                    <!---->
                    
                    <!-- Remove Modal -->
                    <div class="modal fade" id="removeModal{{ $petprofile->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-success text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    If you delete this profile, the records of this pet profile will also be deleted forever.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a href="{{ route('petprofile.destroy', $petprofile->id) }}" type="button" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No Pet/s</p>
        @endif
    </div>
</div>
@endsection