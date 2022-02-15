@extends('layouts.layoutTable')

@include('inc.routes')

@section('layout_content')
    <div class="container-fluid">
        <div class="row justify-content-between mt-4">
            <a href="{{  route('users.index') }}" class="h6" style="text-decoration: none; color: #58753C">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                  </svg>
                Go Back
            </a>
            <div class="display-6">
                Edit User
            </div>
        </div>  

        <div class="row justify-content-between mt-4">
            <form method="POST" action="{{ route('users.update', $users->id) }}">
                @csrf
                @method('PUT')
        
                <div class="form-group">
                    <!--NAME-->
                    <div class="mb-3 ">
                        <label for="_name" class="form-label">First Name</label>
                        <input type="text" value="{{ $users->name }}" class="form-control" name="name" id="_name" placeholder="First Name">
                    </div>
        
                    <!--EMAIL-->
                    <div class="mb-3">
                        <label for="_email" class="form-label">Email Address</label>
                        <input type="email" value="{{ $users->email }}" class="form-control" name="email" id="_email" placeholder="Email Address">          
                    </div>
        
                    <!--TIME-->
                    <div class="mb-3">
                        <label for="_usertype" class="form-label">User Type</label>
                        <select class="form-select" name="user_type" id="_usertype">
                            <option @if ($users->user_type == 'admin')
                                selected
                            @endif value="admin">Admin</option>
                            
                            <option @if ($users->user_type == 'staff')
                                selected
                            @endif value="staff">Staff</option>

                            <option @if ($users->user_type == 'vet')
                                selected
                            @endif value="vet">Vet</option>

                            <option @if ($users->user_type == 'client' or $users->user_type == null)
                                selected
                            @endif value="client">Client</option> 
                        </select>
                    </div>
        
                    <!--SUBMIT-->
                    <div class="mb-3 d-grid gap-2">
                        <button class="btn btn-success" type="submit">Update Account</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    
@endsection