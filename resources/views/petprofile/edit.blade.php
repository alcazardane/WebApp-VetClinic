@extends('layouts.layout')

@section('_content')
<div class="container-fluid p-5">
    <div class="row justify-content-between mt-4">
        <a href="{{  URL::previous() }}" class="h6" style="text-decoration: none; color: #58753C">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            </svg>
            Go Back
        </a>
        <div class="display-6">
            Create Pet Profile
        </div>
    </div>
    
    <div class="row justify-content-between mt-4">
        <form method="POST" action="{{ route('petprofile.update', $petprofile->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            <div class="form-group">

                <div class="mb-3 ">
                    <div class="row">
                        <div class="col">
                            <label for="_petname" class="form-label">Pet Name</label>
                            <input type="text" class="form-control" name="petname" id="_petname" value={{ $petprofile->petname }} required>
                        </div>
                        <div class="col">
                            <label for="_petgender" class="form-label">Pet Gender</label>
                                <select class="form-select" name="petgender" id="_petgender">
                                    <option 
                                        @if ($petprofile->petgender=="Male")
                                            selected
                                        @endif 
                                        value="Male">
                                        Male
                                    </option>
                                    <option 
                                        @if ($petprofile->petgender=="Female")
                                            selected
                                        @endif 
                                        value="Female">
                                        Female
                                    </option>
                                </select>
                        </div>
                    </div>
                </div>
    
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_petspecies" class="form-label">Pet Species</label>
                            <input type="text" name="petspecies" id="_petspecies" value={{ $petprofile->petspecies }} class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="_petbreed" class="form-label">Pet Breed</label>
                            <input type="text" name="petbreed" id="_petbreed" value={{ $petprofile->petbreed }} class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_petimage" class="form-label">Pet Profile Image</label>
                            <input class="form-control" name="petimage" type="file" id="_petimage">
                        </div>
                    </div>
                </div>
    
                <!--SUBMIT-->
                <div class="mb-3 d-grid gap-2">
                    <button class="btn btn-success" type="submit" name="owneremail">Update Record</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection