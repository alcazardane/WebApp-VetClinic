@extends('layouts.layoutTable')

@section('createButton')
<div class="row">
    <div class="col mt-3">
        <form action="{{ route('users.index') }}" method="GET" role="search" class="d-flex">
            <input class="form-control me-2" name="search" id="search" type="search" placeholder="Search.." aria-label="Search">
            <button class="btn btn-primary me-2" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                </svg>
            </a>
        </form>
    </div>
</div>
@endsection

@include('inc.routes')

@section('tbl_name')
    <p class="display-6">Accounts</p>
@endsection

@section('tbl_content')
    <div class="table-responsive">
        <table class="table align-middle" style="background-color: #fff;">
                <tr class="bg-success text-white">
                    <td scope="col">Name</td>
                    <td scope="col">Email Address</td>
                    <td scope="col">User Type</td>
                    <td scope="col"></td>
                </tr>
                @if (count($users) >= 1)
                @foreach ($users as $users)
                    <tr>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->user_type}}</td>
                        <td>
                            <a href="{{ route('users.show', $users->id) }}" class="btn" style="color: #aaaaaa">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                                <b>Edit</b>
                            </a>
                        </td>
                    </tr>
                @endforeach
                @else
                <p>No Records</p>
                @endif
        </table>
    </div>
@endsection