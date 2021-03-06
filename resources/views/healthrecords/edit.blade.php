@extends('layouts.layoutTable')

<!--Sidebar-->
@include('inc.routes')

@section('layout_content')
    <div class="container-fluid">
        <div class="row justify-content-between"">
            <a href="{{  route('healthrecords.index') }}" class="h6" style="text-decoration: none; color: #58753C">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
                Go Back
            </a>
            <div class="display-6">
                Edit Health Record
            </div>
        </div>

        <div class="row mt-4">
            <form method="POST" action="{{ route('healthrecords.update', $healthrecords->id) }}">
                @csrf
                @method('PUT')
        
                <div class="form-group">
                    <!--owner-pet-name-->
                    <div class="mb-3 ">
                        <div class="row">
                            <div class="col">
                                <label for="_ownername" class="form-label">Owner Name</label>
                                <input type="text" class="form-control" name="ownername" id="_ownername" placeholder="Owner Name" value="{{ $healthrecords->ownername }}">
                            </div>
                            <div class="col">
                                <label for="_petname" class="form-label">Pet Name</label>
                                <input type="text" class="form-control" name="petname" id="_petname" placeholder="Pet Name" value="{{ $healthrecords->petname }}">
                            </div>
                        </div>
                    </div>
                    
                    <!--address-bady-->
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="_address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="_address" placeholder="Address" value="{{ $healthrecords->address }}">
                            </div>
                            <div class="col">
                                <label for="_birthday" class="form-label">Birthday (dd-mm-yyyy)</label>
                                <input type="date" name="birthday" class="form-control" id="_birthday" placeholder="Birthday" value="{{ $healthrecords->birthday }}">
                            </div>
                        </div>              
                    </div>
        
                    <!--contactnum-spcies-breed-->
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="_contactnum" class="form-label">Contact #</label>
                                <input type="text" name="contactnum" class="form-control" id="_contactnum" placeholder="Contact Number" value="{{ $healthrecords->contactnum }}">
                            </div>
        
                            <div class="col">
                                <label for="_species" class="form-label">Species</label>
                                <input type="text" name="species" class="form-control" id="_species" placeholder="Pet Species" value="{{ $healthrecords->species }}">
                            </div>
        
                            <div class="col">
                                <label for="_breed" class="form-label">Breed</label>
                                <input type="text" name="breed" class="form-control" id="_breed" placeholder="Pet Breed" value="{{ $healthrecords->breed }}">
                            </div>
                        </div>
                    </div>
    
                    <!--SUBMIT-->
                    <div class="mb-3 d-grid gap-2">
                        <button class="btn btn-success" type="submit">Update Record</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>  
@endsection