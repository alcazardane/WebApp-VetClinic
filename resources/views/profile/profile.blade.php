@extends('layouts.layoutTable')

@include('inc.routes')

@section('tbl_name')
    <p class="display-6">My Profile</p>
@endsection

@section('layout_content')
    <div class="container">
        <div class="row align-items-center">
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

        <div class="row mt-5">
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
@endsection