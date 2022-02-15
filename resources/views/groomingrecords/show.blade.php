@extends('layouts.layoutTable')

@include('inc.routes')

@section('layout_content')
    <div class="container-fluid">
        <div class="row justify-content-between mt-4">
            <a href="{{  route('groomingrecords.index') }}" class="h6" style="text-decoration: none; color: #58753C">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                  </svg>
                Go Back
            </a>
        </div>

        <div class="row mt-4">
            <p class="display-6">Grooming History</p>
        </div>

        <div class="row mt-4">
            <p class="h5">Basic Information</p>
            
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Owner Name:</div>
                            {{ $groomingrecords->ownername }}
                        </div>
                    </li>
        
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Pet Name:</div>
                            {{ $groomingrecords->petname }}
                        </div>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Species:</div>
                            {{ $groomingrecords->species }}
                        </div>
                    </li>
        
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Breed:</div>
                            {{ $groomingrecords->breed }}
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row mt-4">
            <p class="h5">History</p>

            <div class="btn-group-sm mt-3" role="group" aria-label="Basic example">
                <a href="#multiCollapseExample1" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multiCollapseExample1" role="button" class="btn btn-success btn-sm">
                    + Add History
                </a>
                @if (count($history) > 0)
                    <a href="/docxgenerate-grooming/{{ $groomingrecords->id }}" class="btn btn-secondary btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"/>
                            <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                          </svg>
                        Download History
                    </a>
                @endif
            </div>

            <div class="col mt-4">
                <div class="table-responsive">
                    <table class="table bg-light">
                        <tr class="bg-success text-white">
                            <td class="h6" scope="col">Date</td>
                            <td class="h6" scope="col">Services</td>
                            <td class="h6" scope="col"></td>
                            <td class="h6" scope="col"></td>
                        </tr>
                        @if (count($history) >= 1)
                            @foreach ($history as $history)
                                <tr>
                                    <td>{{ $history->date }}</td>
                                    <td>{{ $history->services }}</td>
                                    <td>
                                        <a href="{{ route('groominghistory.destroy', $history->id) }}" class="btn" type="button" style="color: #990000;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                            <b>Delete</b>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#multiCollapseEdit{{ $history->id }}" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multiCollapseEdit" role="button" class="btn" style="color: #aaaaaa">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                            </svg>
                                            <b>Edit</b>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="collapse multi-collapse" id="multiCollapseEdit{{ $history->id }}" colspan="4">
                                        <table class="table mb-0">
                                            <div>
                                                @include('inc.editgroominghistory')
                                            </div>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                            
                            @else
                            <tr>
                                <td>No History</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="collapse multi-collapes" id="multiCollapseExample1">
                @include('inc.creategroominghistory')
            </div>
        </div>
    </div>
@endsection