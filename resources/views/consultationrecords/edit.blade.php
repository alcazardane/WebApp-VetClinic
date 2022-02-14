@extends('layouts.layoutTable')

@include('inc.routes.consultationrecords')

@section('layout_content')
    <div class="container-fluid">
        <div class="row justify-content-between mt-4">
            <a href="{{  route('consultationrecords.index') }}" class="h6" style="text-decoration: none; color: #58753C">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
                Go Back
            </a>
            <div class="display-6">
                Edit Consultation Record
            </div>
        </div>
    </div>

    <div class="row justify-content-between mt-4">
        <form action="{{ route('consultationrecords.update', $records->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_ownername" class="form-label">Owner Name</label>
                            <input type="text" class="form-control" name="ownername" id="_ownername" value="{{ $records->ownername }}">
                        </div>
                        <div class="col">
                            <label for="_petname" class="form-label">Pet Name</label>
                            <input type="text" class="form-control" name="petname" id="_petname" value="{{ $records->petname }}">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_species" class="form-label">Species</label>
                            <input type="text" name="species" class="form-control" id="_species" value="{{ $records->species }}">
                        </div>
    
                        <div class="col">
                            <label for="_breed" class="form-label">Breed</label>
                            <input type="text" name="breed" class="form-control" id="_breed" value="{{ $records->breed }}">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="recid" value="{{ $records->recid }}">

                <div class="mb-3 d-grid gap-2">
                    <button class="btn btn-success" type="submit">Insert Record</button>
                </div>

            </div>

        </form>
    </div>
@endsection