@extends('layouts.layoutTable')

@section('createButton') 
<div class="row">
    <div class="col mt-3">
        <form action="{{ route('vetstaff.index') }}" method="GET" role="search" class="d-flex">
            <input class="form-control me-2" name="search" id="search" type="search" placeholder="Search.." aria-label="Search">
            <button class="btn btn-primary me-2" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
            <a href="{{ route('vetstaff.index') }}" class="btn btn-secondary me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                </svg>
            </a>
            <a href="{{ route('vetstaff.create') }}" type="button" class="btn btn-success">+</a>
        </form>
    </div>
</div>
@endsection

@include('inc.routes.vetstaff')

@section('tbl_name')
    <p class="display-6">Vet and Staff</p>
@endsection

@section('tbl_content')
    <div class="table-responsive">
        <table class="table" style="background-color: #fff;">
            <tr class="bg-success text-white">
                <td scope="col">ID</td>
                <td scope="col">First Name</td>
                <td scope="col">Last Name</td>
                <td scope="col">Sex</td>
                <td scope="col">Address</td>
                <td scope="col">Contact No.</td>
                <td scope="col">Email.</td>
                <td scope="col">Job Title</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>
            @if (count($vetstaff) >= 1)
            @foreach ($vetstaff as $vetstaff)
                @if($vetstaff->status == "active")
                    <tr>
                        <th scope="row">{{$vetstaff->vetstaffid}}</th>
                        <td>{{$vetstaff->firstname}}</td>
                        <td>{{$vetstaff->lastname}}</td>
                        <td>{{$vetstaff->sex}}</td>
                        <td>{{$vetstaff->address}}</td>
                        <td>{{$vetstaff->contactnum}}</td>
                        <td>{{$vetstaff->email}}</td>
                        <td>{{$vetstaff->desc}}</td>
                        <td>
                            <a href="{{ route('vetstaff.show', $vetstaff->id) }}" class="btn text-primary" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal{{ $vetstaff->id }}" class="btn text-secondary" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                                    <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                                </svg>
                            </button>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $vetstaff->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Hold up!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        You are about to archive this record. Do you wish to proceed?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ route('vetstaff.archive', $vetstaff->id) }}" type="button" class="btn btn-success">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <td>
                            <a href="{{ route('vetstaff.edit', $vetstaff->id) }}" class="btn text-success" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
            @else
                <p>No Records</p>
            @endif
        </table>
    </div>
@endsection