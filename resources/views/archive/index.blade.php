@extends('layouts.layoutTable')

@include('inc.routes.archive')

@section('tbl_name')
    <p class="display-6">Archives</p>
@endsection

@section('tbl_content')
    <div class="bg-white">
        <ul class="list-group list-group-flush m-3">
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
                <a href="{{ route('archive.appointments') }}">Appointments</a>
            </li>
            <li class="list-group-item mt-3 mb-3">
                <a href="{{ route('archive.groomingrecords') }}">Grooming Records</a>
            </li>
            <li class="list-group-item mt-3 mb-3">
                <a href="{{ route('archive.surgicalrecords') }}">Surgery Records</a>
            </li>
            <li class="list-group-item mt-3 mb-3">
                <a href="{{ route('archive.vetstaff') }}">Vet & Staff</a>
            </li>
        </ul>
    </div>
    
@endsection