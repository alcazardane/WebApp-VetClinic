@extends('layouts.layoutTable')

@include('inc.routes.archive')

@section('tbl_name')
    <p class="display-6">Archives</p>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('archive.index') }}">Archives</a></li>
          <li class="breadcrumb-item active" aria-current="page">Appointments</li>
        </ol>
    </nav>
@endsection

@section('tbl_content')
<div class="table-responsive">
    <table class="table" style="background-color: #fff;">
            <tr class="bg-success text-white">
                <td scope="col">First Name</td>
                <td scope="col">Last Name</td>
                <td scope="col">Contact Number</td>
                <td scope="col">Email Address</td>
                <td scope="col">Date</td>
                <td scope="col">Time</td>
                <td scope="col">Purpose</td>
                <td scope="col"></td>
            </tr>
            @if (count($appointments) >= 1)
            @foreach ($appointments as $appointments)
                @if (Carbon\Carbon::parse(date('Y-m-d', strtotime($appointments->datetime)))->lte(date('Y-m-d', strtotime(Carbon\Carbon::now()))) || $appointments->status == "archive")
                <tr>
                    <td>{{$appointments->firstname}}</td>
                    <td>{{$appointments->lastname}}</td>
                    <td>{{$appointments->contactnum}}</td>
                    <td>{{$appointments->email}}</td>
                    <td>{{date('Y-m-d', strtotime($appointments->datetime))}}</td>
                    <td>{{date('h:i a', strtotime($appointments->datetime))}}</td>
                    <td>{{$appointments->purpose}}</td>
                    <td>
                        <a data-bs-toggle="modal" href="#exampleModal{{ $appointments->id }}" class="me-2 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                            </svg>
                            <b>Restore</b>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $appointments->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Hold up!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    @if (Carbon\Carbon::parse(date('Y-m-d', strtotime($appointments->datetime)))->lte(date('Y-m-d', strtotime(Carbon\Carbon::now()))))
                                        <div class="modal-body">
                                            This appointment can not be restored because the date has already passed.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Okay</button>
                                        </div>
                                    @elseif (Carbon\Carbon::parse(date('Y-m-d', strtotime($appointments->datetime)))->gte(date('Y-m-d', strtotime(Carbon\Carbon::now()))) && $appointments->status == "archive")
                                        <div class="modal-body">
                                            You are about to activate this record. Do you wish to proceed?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="{{ route('archive.restoreappointment', $appointments->id) }}" type="button" class="btn btn-success">Yes</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                
            @endforeach
            @else
            <p>No Appointments</p>
            @endif
    </table>
</div>
@endsection