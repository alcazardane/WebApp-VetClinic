@extends('layouts.layoutTable')

@include('inc.routes')

@section('tbl_name')
    <p class="display-6">Archives</p>
@endsection

@section('tbl_content')
    <div class="bg-white">
        <ul class="list-group list-group-flush m-3">
            @if (Auth::user()->user_type == "admin" || Auth::user()->user_type == "vet" || Auth::user()->user_type == "staff")
                <li class="list-group-item mt-3 mb-3">
                    <a href="{{ route('archive.appointments') }}">Appointments</a>
                </li>
            @endif
            @if (Auth::user()->user_type == "admin" || Auth::user()->user_type == "vet")
                <li class="list-group-item mt-3 mb-3">
                    <a href="{{ route('archive.healthrecords') }}">Health Records</a>
                </li>
                <li class="list-group-item mt-3 mb-3">
                    <a href="{{ route('archive.consultationrecords') }}">Consultation Records</a>
                </li>
                <li class="list-group-item mt-3 mb-3">
                    <a href="{{ route('archive.vaxrecords') }}">Vaccine Records</a>
                </li>
                <li class="list-group-item mt-3 mb-3">
                    <a href="{{ route('archive.groomingrecords') }}">Grooming Records</a>
                </li>
                <li class="list-group-item mt-3 mb-3">
                    <a href="{{ route('archive.surgicalrecords') }}">Surgery Records</a>
                </li>
            @endif
            @if (Auth::user()->user_type == "admin")
                <li class="list-group-item mt-3 mb-3">
                    <a href="{{ route('archive.vetstaff') }}">Vet & Staff</a>
                </li>
            @endif
        </ul>
    </div>
    
@endsection