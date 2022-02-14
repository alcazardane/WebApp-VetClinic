@extends('layouts.layoutTable')

@include('inc.routes.vetstaff')

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
        </div>

        <div class="row justify-content-between mt-4">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <small class="fw-bold">ID:</small>
                        <div class="fs-5">{{ $vetstaff->vetstaffid }}</div>
                        
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <small class="fw-bold">First Name:</small>
                        <div class="fs-5">{{ $vetstaff->firstname }}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <small class="fw-bold">Last Name:</small>
                        <div class="fs-5">{{$vetstaff->lastname}}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <small class="fw-bold">Sex:</small>
                        <div class="fs-5">{{$vetstaff->sex}}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <small class="fw-bold">Address:</small>
                        <div class="fs-5">{{$vetstaff->address}}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <small class="fw-bold">Contact No.:</small>
                        <div class="fs-5">{{$vetstaff->contactnum}}</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <small class="fw-bold">Job Title:</small>
                        <div class="fs-5">{{$vetstaff->desc}}</div>
                    </div>
                </li>
            </ul>
            <div class="mt-3">
                <a href="{{ route('vetstaff.edit', $vetstaff->id) }}" class="btn btn-success" type="button">Edit Record</a>
            </div>
        </div>
    </div>
@endsection