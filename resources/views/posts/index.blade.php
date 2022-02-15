@extends('layouts.layoutTable')

@section('createButton') 
    <div class="col align-self-end">
        <a href="{{ route('posts.create') }}" type="button" class="btn btn-success btn-sm">+ New Post</a>
    </div>
@endsection

@include('inc.routes')

@section('tbl_name')
    <p class="display-6">Posts</p>
@endsection

@section('layout_content')
    <div class="list-group mb-3 mt-3">
        @if (count($posts) >= 1)
            @foreach ($posts as $post)
            <div class="list-group-item mb-3" aria-current="true">
                <div class="row">
                    @if ($post->coverimage)
                        <div class="col-md-4 col-sm-4">
                            <img class="img-fluid" src="/storage/coverimages/{{ $post->coverimage }}">
                        </div>
                    @endif
                    <div class="col-md-4 col-sm-4">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">
                                {{ $post->title }}
                                <span class="badge bg-secondary text-capitalize fw-normal">
                                    {{ $post->status }}
                                </span>
                            </h5>
                        </div>
                        <p class="mb-1">{!! $post->body !!}</p><br>
                        <small>
                            <a href="posts-destroy/{{ $post->id }}" class="me-2" style="color: #990000; text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                                <b>Delete</b>
                            </a>

                            @if ($post->status == "unpublish")
                            <a href="{{ route('posts.show', $post->id) }}" class="me-2" style="color: #1B4F72; text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                                <b>View</b>
                            </a>
                            
                            <a href="/posts-publish/{{ $post->id }}" class="me-2" type="button" style="color: #58753C; text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"/>
                                </svg>
                                <b>Publish</b>
                            </a>
                            
                            <a href="{{ route('posts.edit', $post->id) }}" class="me-2" type="button" style="color: #aaaaaa; text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                                <b>Edit</b>
                            </a>
                            @endif
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