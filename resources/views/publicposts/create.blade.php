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
            <div class="col-4 h4">
                Create New Post
            </div>
        </div>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label for="_title" class="form-label">Title / Heading</label>
                    <input type="text" class="form-control" name="title" id="_title" placeholder="Title / Heading of the post">
                </div>

                <div class="mb-3">
                    <label for="_body" class="form-label">Body / Description</label>
                    <textarea name="body" id="_body" cols="30" rows="10" class="ckeditor form-control" placeholder="Body / Description of the post"></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Cover Image</label>
                    <input class="form-control" name="coverimage" type="file" id="formFile">
                </div>

                <div class="mb-3 d-grid gap-2">
                    <button class="btn btn-success" type="submit">Create Post</button>
                </div>
            </div>
        </form>
    </div>
@endsection