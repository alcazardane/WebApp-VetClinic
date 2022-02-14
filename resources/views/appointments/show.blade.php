@extends('layouts.layoutTable')

@include('inc.routes.appointments')

@section('layout_content')
    <div class="container-fluid">
        <div class="row justify-content-between"">
            <a href="{{  route('appointment.index') }}" class="h6" style="text-decoration: none; color: #58753C">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                  </svg>
                Go Back
            </a>
        </div>

        <div class="row">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    First Name:
                    <span style="font-weight: bold">{{ $appointments->firstname }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Last Name:
                    <span style="font-weight: bold">{{$appointments->lastname}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Contact Number:
                    <span style="font-weight: bold">{{$appointments->contactnum}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Email Address:
                    <span style="font-weight: bold">{{$appointments->email}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Date:
                    <span style="font-weight: bold">{{date('m/d/Y', strtotime($appointments->datetime))}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Time:
                    <span style="font-weight: bold">{{date('h:m A', strtotime($appointments->datetime))}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Purpose:
                    <span style="font-weight: bold">{{$appointments->purpose}}</span>
                </li>
            </ul>
            <div class="mt-3">
                <a href="/appointment/edit/{{$appointments->id}}" class="btn btn-success" type="button">Edit Appointment</a>
            </div>
        </div>
        
    </div>
@endsection