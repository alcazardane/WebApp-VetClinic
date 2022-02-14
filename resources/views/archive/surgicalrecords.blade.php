@extends('layouts.layoutTable')

@include('inc.routes.archive')

@section('tbl_name')
    <p class="display-6">Archives</p>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('archive.index') }}">Archives</a></li>
          <li class="breadcrumb-item active" aria-current="page">Surgical Records</li>
        </ol>
    </nav>
@endsection

@section('tbl_content')
@if (count($records) >= 1)
    <div class="table-responsive mt-4">
        <table class="table" style="background-color: #fff;">
            <tr class="bg-success text-white">
                <td class="h6" scope="col">Owner Name</td>
                <td class="h6" scope="col">Pet Name</td>
                <td class="h6" scope="col">Species</td>
                <td class="h6" scope="col">Breed</td>
                <td class="h6" scope="col">Gender</td>
                <td class="h6" scope="col"></td>
            </tr>

            @foreach ($records as $records)
                @if ($records->status == "archive")
                    <tr>
                        <td>{{$records->ownername}}</td>
                        <td>{{$records->petname}}</td>
                        <td>{{$records->species}}</td>
                        <td>{{$records->breed}}</td>
                        <td>{{$records->gender}}</td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal{{ $records->id }}" class="btn text-primary" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                  </svg>
                                <b>Restore</b>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $records->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Hold up!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            You are about to activate this record. Do you wish to proceed?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="{{ route('archive.restoresr', $records->id) }}" type="button" class="btn btn-success">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
    @endif
@endsection