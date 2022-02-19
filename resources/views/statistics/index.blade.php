@extends('layouts.layoutTable')

@section('createButton')
    
        <div class="row">
            <div class="col mt-3">
                <form action="{{ route('statistics.index') }}" method="GET" role="search" class="d-flex">
                    <input class="form-control me-2" name="search" id="search" type="search" placeholder="Search Date .." aria-label="Search">
                    <button class="btn btn-primary me-2" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                    <a href="{{ route('statistics.index') }}" class="btn btn-secondary me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                        </svg>
                    </a>
                    @if (count($report) >= 1)
                    <a data-bs-toggle="modal" data-bs-target="#reportTypeModal" type="button" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"/>
                            <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                          </svg>
                    </a>
                    @endif
                </form>
                @include('inc.reportmodal')
            </div>
        </div>
    

@endsection

@include('inc.routes')

@section('tbl_name')
    <p class="display-6">Clinic Reports</p>
@endsection

@section('tbl_content')
    
    <div class="table-responsive rounded mt-4">
        <table class="table align-middle" style="background-color: #fff;">
            <tr class="bg-success text-white">
                <td class="h6" scope="col">Appointment</td>
                <td class="h6" scope="col">Health</td>
                <td class="h6" scope="col">Vaccine</td>
                <td class="h6" scope="col">Grooming</td>
                <td class="h6" scope="col">Consultation</td>
                <td class="h6" scope="col">Surgical</td>
                <td class="h6" scope="col">Date</td>
            </tr>
            @if (count($report) >= 1)
            @foreach ($report as $report)
                <tr>
                    <td>{{$report->appointment}}</td>
                    <td>{{$report->health}}</td>
                    <td>{{$report->vaccine}}</td>
                    <td>{{$report->grooming}}</td>
                    <td>{{$report->consultation}}</td>
                    <td>{{$report->surgical}}</td>
                    <td>{{ $report->reporteddate }}</td>
                </tr>
            @endforeach
            @else
            <p>No Records</p>
            @endif
        </table>
    </div>
    
@endsection