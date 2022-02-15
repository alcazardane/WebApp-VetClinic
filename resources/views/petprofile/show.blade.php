@extends('layouts.layout')

@section('_content')
<div class="container-fluid p-5">
    <div class="row justify-content-between mt-4">
        <a href="{{ url('client-profile/'.Auth::user()->id) }}" class="h6" style="text-decoration: none; color: #58753C">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            </svg>
            Go Back
        </a>
    </div>

    <div class="card">
        <div class="card-body p-5">
            <div class="row d-flex align-items-center">
                <div class="col-lg-3 mt-3 align-items-center">
                    <img
                        src="/storage/profileimage/{{ $petprofile->profilepicture }}"
                        class="rounded-circle img-fluid"
                        height="35%"
                        alt="Avatar"
                        loading="lazy"
                    />
                </div>
        
                <div class="col-lg-7 mt-3">
                    <ul class="list-group list-group-flush">
                        <li style="background-color: transparent" class="list-group-item d-flex justify-content-between align-items-start">
                            <b>Name: </b> {{ $petprofile->petname }}
                        </li>
                        <li style="background-color: transparent" class="list-group-item d-flex justify-content-between align-items-start">
                            <b>Pet Gender: </b> {{ $petprofile->petgender }}
                        </li>
                        <li style="background-color: transparent" class="list-group-item d-flex justify-content-between align-items-start">
                            <b>Pet Species: </b> {{ $petprofile->petspecies }}
                        </li>
                        <li style="background-color: transparent" class="list-group-item d-flex justify-content-between align-items-start">
                            <b>Pet Breed: </b> {{ $petprofile->petbreed }}
                        </li>
                    </ul>
                </div>
        
                {{-- Pet Profile --}}
                <div class="row mt-3">
                    <p class="display-6">{{ $petprofile->petname }} Records</p>
                    <div class="col">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-owneremail={{ Auth::user()->email }} data-bs-petname={{ $petprofile->petname }} class="btn btn-success btn-sm mt-3">Request</button>
                    </div>
        
                    <!--MODAL-->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            var exampleModal = document.getElementById('exampleModal2')
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
                </div>
                
                {{-- Pet Vax Records --}}
                <div class="col mt-3">
                    <div class="table-responsive">
                        <table class="table table-sm" style="background-color: #fff;">
                            <tr class="bg-success text-white">
                                <td scope="col">Vaccine Description</td>
                                <td scope="col">Veterinarian</td>
                                <td scope="col">Vaccination Date</td>
                                <td scope="col">Follow-up Date</td>
                                <td scope="col">Status</td>
                                <td scope="col"></td>
                                <td scope="col"></td>
                            </tr>
                            @if (count($history) >= 1)
                                @foreach ($history as $history)
                                    <tr>
                                        <td>{{ $history->vaxdesc }}</td>
                                        <td>{{ $history->vet }}</td>
                                        <td>{{ $history->date }}</td>
                                        <td>{{ $history->fdate }}</td>
                                        <td>{{ $history->status }}</td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td>No History</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
        
                {{-- Pet PDF Records --}}
                <div class="row mt-3">
                    @if (count($records) >= 1)
                        <ul class="list-group list-group-flush">
                            @foreach ($records as $records)
                                <li class="list-group-item d-flex justify-content-between align-items-start mt-4">
                                    <a href="/storage/filerecords/{{ $records->filerecord }}" target="_blank" rel="noopener noreferrer">{{ $records->filerecord }}</a>
                                    <a href="{{ route('pubrecords.destroy', $records->id) }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>{{ $petprofile->petname }} don't have any records.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection