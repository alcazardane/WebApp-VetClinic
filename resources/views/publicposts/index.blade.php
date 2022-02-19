@extends('layouts.layoutTable')

@include('inc.routes')

@section('tbl_name')
    <h4>Public Posts</h4>
@endsection

@section('layout_content')
    <div class="list-group mb-3 mt-3">
        @if (count($pubs) >= 1)
            @foreach ($pubs as $pub)
            <div class="list-group-item mb-3" aria-current="true">
                <div class="row">
                    @if ($pub->coverimage)
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/storage/coverimages/{{ $pub->coverimage }}">
                        </div>
                    @endif
                    <div class="col-md-4 col-sm-4">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">
                                {{ $pub->title }}
                                <span class="badge bg-secondary text-capitalize fw-normal">
                                    {{ $pub->status }}
                                </span>
                            </h5>
                        </div>
                        <p class="mb-1">{!! $pub->body !!}</p><br>
                        <small>
                            <a href="/publicposts-hidepost/{{ $pub->id }}" class="me-2 text-success" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                    <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                  </svg>
                                <b>Hide</b>
                            </a>
                            <a href="{{ route('publicposts.show', $pub->id) }}" class="me-2 text-primary" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                                <b>View</b>
                            </a>
                            <a href="/publicposts-destroy/{{ $pub->id }}" class="me-2 text-danger" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                                <b>Delete</b>
                            </a>
                        </small>
                    </div>
                </div>
                
            </div>
            @endforeach
        @else
            <p>No Posts</p>
        @endif
    </div>
@endsection