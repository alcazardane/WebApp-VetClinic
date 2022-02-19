@extends('layouts.layoutTable')

@include('inc.routes')

@section('layout_content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        
        {{-- Upcoming Appointments --}}
        <div class="row">
            <p class="display-6">Upcoming Appointments</p>
            
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-white order-card">
                    <div class="card-block" style="color: #198754">
                        <h5 class="m-b-0">
                            {{ $appointment
                                ->where('purpose', 'Vaccination')
                                ->where('datetime', '>=', \Carbon\Carbon::today())
                                ->where('status', 'active')
                                ->count() 
                            }}
                        </h5>
                        <h6 class="m-b-20">Vaccination</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-white order-card">
                    <div class="card-block" style="color: #198754">
                        <h5 class="m-b-0">
                            {{ $appointment
                                ->where('purpose', 'Grooming')
                                ->where('datetime', '>=', \Carbon\Carbon::today())
                                ->where('status', 'active')
                                ->count() 
                            }}
                        </h5>
                        <h6 class="m-b-20">Grooming</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-white order-card">
                    <div class="card-block" style="color: #198754">
                        <h5 class="m-b-0">
                            {{ $appointment
                                ->where('purpose', 'Consultation')
                                ->where('datetime', '>=', \Carbon\Carbon::today())
                                ->where('status', 'active')
                                ->count()
                            }}
                        </h5>
                        <h6 class="m-b-20">Consultation</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-white order-card">
                    <div class="card-block" style="color: #198754">
                        <h5 class="m-b-0">
                            {{ $appointment
                                ->where('purpose', 'Surgery')
                                ->where('datetime', '>=', \Carbon\Carbon::today())
                                ->where('status', 'active')
                                ->count()
                            }}
                        </h5>
                        <h6 class="m-b-20">Surgery</h6>
                    </div>
                </div>
            </div>

    	</div>

        {{-- Requests --}}
        <div class="row mt-4">
            <p class="display-6">Requests</p>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-white order-card">
                    <div class="card-block" style="color: #198754">
                        <h5 class="m-b-0">{{ $reqrecord->where('status', 'unattended')->count() }}</h5>
                        <h6 class="m-b-20">Unattended Requests</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection