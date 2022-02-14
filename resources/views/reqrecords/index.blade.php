@extends('layouts.layoutTable')

@include('inc.routes.requestrecords')

@section('tbl_name')
    <p class="display-6">Record Requests</p>
@endsection

@section('layout_content')
    <div class="list-group list-group-flush mb-3 mt-3">
        @if (count($req) >= 1)
            @foreach ($req as $req)
                <div class="list-group-item mb-3" aria current="true">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <p class="fs-5 fw-bold">{{ $req->name }}</p>
                            <p>{{ $req->email }}</p>
                            <p><b>Request: </b> {{ $req->request }}</p>
                            <p><b>Pet Name: </b> {{ $req->petname }}</p>
                            <p><b>Status: </b> {{ $req->status }}</p>
                            <small>
                                
                                <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-email={{ $req->email }} data-bs-petname={{ $req->petname }} class="me-2" style="color: #1B4F72; text-decoration: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                    </svg>
                                    <b>Respond</b>
                                </a>
                                
                                <a href="reqrecords/{{ $req->id }}" class="me-2" style="color: #990000; text-decoration: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                    <b>Remove</b>
                                </a>
                            </small>
                        </div>
                    </div>
                </div>
                @include('inc.respondrequest')
            @endforeach
        @else
        <p>No Requests</p>
        @endif
    </div>
@endsection