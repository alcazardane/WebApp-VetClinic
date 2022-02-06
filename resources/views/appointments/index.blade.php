@extends('layouts.layoutTable')

@section('createButton')
<div class="row">
    <div class="col mt-3">
        <form action="{{ route('appointment.index') }}" method="GET" role="search" class="d-flex">
            <input class="form-control me-2" name="search" id="search" type="search" placeholder="Search.." aria-label="Search">
            <button class="btn btn-primary me-2" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
            <a href="{{ route('appointment.index') }}" class="btn btn-secondary me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                </svg>
            </a>
            <a href="{{ route('appointment.create') }}" type="button" class="btn btn-success">+</a>
        </form>
    </div>
</div>
@endsection

@section('_routes')

    <!--Admin Vet Staff-->
    <!--Dashboard-Appointments-Posts-PublicPosts-->
    @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff' || Auth::user()->user_type == 'vet')
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action py-2 ripple mt-3" aria-current="true" style="color: #a8a8a8;" active>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-columns-gap" viewBox="0 0 16 16">
                <path d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
            </svg>
            Dashboard
        </a>

        <a href="{{ route('appointment.index') }}" class="list-group-item list-group-item-action py-2 ripple mt-3" aria-current="true" style="color: #58753C; font-weight: bold;" >   
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>
            Appointments
        </a>

        <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action py-2 ripple mt-3" aria-current="true" style="color: #a8a8a8;" active>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
            <span>Posts</span>
        </a>

        <a href="{{ route('publicposts.index') }}" class="list-group-item list-group-item-action py-2 ripple mt-3" aria-current="true" style="color: #a8a8a8;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
            </svg>
            <span>Public Posts</span>
        </a>
    @endif
    
    <!--Admin-->
    <!--Vet&Staff-Users-->
    @if (Auth::user()->user_type == 'admin')
        <a href="{{ route('vetstaff.index') }}" class="list-group-item list-group-item-action py-2 ripple mt-3" aria-current="true" style="color: #a8a8a8;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-thermometer-half" viewBox="0 0 16 16">
                <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415z"/>
                <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>
            </svg>
            Vet & Staff    
        </a>

        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action py-2 ripple mt-3" aria-current="true" style="color: #a8a8a8;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
            </svg>
            Users
        </a>
    @endif
    
    <!--Admin Vet-->
    <!--Records-->
    @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'vet')
        <a class="list-group-item list-group-item-action py-2 ripple mt-3 dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer; color: #a8a8a8;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder2" viewBox="0 0 16 16">
                <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v7a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zM2.5 3a.5.5 0 0 0-.5.5V6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5zM14 7H2v5.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V7z"/>
            </svg>
            Records
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li>
                <a href="{{ route('healthrecords.index') }}" class="dropdown-item" style="color: #a8a8a8;">Health Records</a>
            </li>
            <li>
                <a href="{{ route('vaxrecords.index') }}" class="dropdown-item" style="color: #a8a8a8;">Vaccine Records</a>
            </li>
            <li>
                <a href="{{ route('groomingrecords.index') }}" class="dropdown-item" style="color: #a8a8a8;">Grooming Records</a>
            </li>
            <li>
                <a href="{{ route('consultationrecords.index') }}" class="dropdown-item" style="color: #a8a8a8;">Consultation Records</a>
            </li>
            <li>
                <a href="{{ route('surgicalrecords.index') }}" class="dropdown-item" style="color: #a8a8a8;">Surgical Records</a>
            </li>
        </ul>
    @endif
    
    <!--Admin Staff-->
    <!--Requests-->
    @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff')
        <a href="/reqrecords" class="list-group-item list-group-item-action py-2 ripple mt-3" aria-current="true" style="color: #a8a8a8" active>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            </svg>
            <span>Requests</span>
        </a>
    @endif

@endsection

@section('tbl_name')
    <p class="display-6">Appointments</p>
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
                    <td scope="col"></td>
                    <td scope="col"></td>
                    <td scope="col"></td>
                    <td scope="col"></td>
                </tr>
                @if (count($appointments) >= 1)
                @foreach ($appointments as $appointments)
                    @if (Carbon\Carbon::parse(date('Y-m-d', strtotime($appointments->datetime)))->gte(date('Y-m-d', strtotime(Carbon\Carbon::now()))))
                    <tr>
                        <td>{{$appointments->firstname}}</td>
                        <td>{{$appointments->lastname}}</td>
                        <td>{{$appointments->contactnum}}</td>
                        <td>{{$appointments->email}}</td>
                        <td>{{date('Y-m-d', strtotime($appointments->datetime))}}</td>
                        <td>{{date('h:i a', strtotime($appointments->datetime))}}</td>
                        <td>{{$appointments->purpose}}</td>
                        <td>
                            <a href="{{ route('appointment.destroy', $appointments->id) }}" class="me-2 text-danger" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('appointment.show', $appointments->id) }}" class="me-2 text-primary" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('appointment.edit', $appointments->id) }}" class="me-2 text-secondary" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="send-email/{{$appointments->id}}" class="me-2 text-warning" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                </svg>
                            </a>
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