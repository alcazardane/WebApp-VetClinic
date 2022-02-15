@extends('layouts.layoutTable')

@include('inc.routes')

@section('layout_content')
    <div class="container-fluid">
        <div class="row justify-content-between mt-4">
            <a href="{{  route('vetstaff.index') }}" class="h6" style="text-decoration: none; color: #58753C">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
                Go Back
            </a>
            <div class="display-6">
                Edit Record
            </div>
        </div>

        <div class="row justify-content-between mt-4">
            <form action="{{ route('vetstaff.update', $vetstaff->id) }}" method="post">
                @csrf
                @method('PUT')
    
                <div class="form-group">
    
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="_firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="_firstname" placeholder="First Name" value="{{ $vetstaff->firstname }}">
                            </div>
                            <div class="col">
                                <label for="_lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="_lastname" placeholder="Last Name" value="{{ $vetstaff->lastname }}">
                            </div>
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="_sex" class="form-label">Sex</label>
                                <input type="text" class="form-control" name="sex" id="_sex" placeholder="Sex" value="{{ $vetstaff->sex }}">
                            </div>
    
                            <div class="col">
                                <label for="_contactnum" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="contactnum" id="_contactnum" placeholder="Contact Number" value="{{ $vetstaff->contactnum }}">
                            </div>
    
                            <div class="col">
                                <label for="_desc" class="form-label">Description</label>
                                <input type="text" class="form-control" name="desc" id="_desc" placeholder="Job Title" value="{{ $vetstaff->desc }}">
                            </div>
    
                            <div class="col">
                                <label for="_id" class="form-label">ID</label>
                                <input type="text" class="form-control" name="vetstaffid" id="_id" placeholder="ID" value="{{ $vetstaff->vetstaffid }}">
                            </div>
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="_address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="_address" placeholder="Address" value="{{ $vetstaff->address }}">
                            </div>
                        </div>
                    </div>
    
                    <div class="mb-3 d-grid gap-2">
                        <button class="btn btn-success" type="submit">Update Record</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
@endsection