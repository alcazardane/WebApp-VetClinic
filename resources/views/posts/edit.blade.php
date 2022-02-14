@extends('layouts.layoutTable')

@include('inc.routes.posts')

@section('layout_content')
    <div class="container-fluid">
        <div class="row justify-content-between mt-4">
            <a href="{{  route('posts.index') }}" class="h6" style="text-decoration: none; color: #58753C">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
                Go Back
            </a>
            <div class="display-6">
                Edit Post
            </div>
        </div>

        <div class="row justify-content-between mt-4">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
    
                <div class="form-group">
                    <div class="mb-3">
                        <label for="_title" class="form-label">Title / Heading</label>
                        <input type="text" class="form-control" name="title" id="_title" value="{{ $post->title }}">
                    </div>
    
                    <div class="mb-3">
                        <label for="_body" class="form-label">Body / Description</label>
                        <textarea name="body" id="_body" cols="30" rows="10" class="ckeditor form-control">{!! $post->body !!}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Cover Image</label><br>
                        <small>*No changes will be made if left empty.</small>
                        <input class="form-control" name="coverimage" type="file" id="formFile" value="{{ $post->coverimage }}">
                    </div>
    
                    <div class="mb-3 d-grid gap-2">
                        <button class="btn btn-success" type="submit">Edit Post</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
@endsection