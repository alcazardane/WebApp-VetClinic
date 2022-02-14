@extends('layouts.layoutTable')

@include('inc.routes.publicposts')

@section('layout_content')
    <div class="container-fluid">
        <div class="row justify-content-between"">
            <a href="{{  route('posts.index') }}" class="h6" style="text-decoration: none; color: #58753C">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                  </svg>
                Go Back
            </a>
        </div>
        <div class="p-3">
            <h4>{{ $post->title }}</h4>
            <p>{!! $post->body !!}</p>
            @if ($post->coverimage)
                <img style="width:100%" src="/storage/coverimages/{{ $post->coverimage }}" alt="cover image">
            @endif
        </div>
    </div>
    
    
@endsection