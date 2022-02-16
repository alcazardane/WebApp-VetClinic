@extends('layouts.layoutTable')

@include('inc.routes')

@section('layout_content') 
    <div class="container-fluid">
        <div class="row justify-content-between mt-4">
            <a href="{{  route('appointment.index') }}" class="h6" style="text-decoration: none; color: #58753C">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
                Go Back
            </a>
            <div class="display-6">
                Set New Appointment
            </div>
        </div>

        <div class="row justify-content-between mt-4">
            <form method="POST" action="{{ route('appointment.store')}}">
                @csrf
        
                <div class="form-group">
                    <!--FIRST LAST NAME-->
                    <div class="mb-3 ">
                        <div class="row">
                            <div class="col">
                                <label for="_firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="_firstname" placeholder="First Name" required>
                            </div>
                            <div class="col">
                                <label for="_lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="_lastname" placeholder="Last Name" required>
                            </div>
                        </div>
                    </div>
                    
                    <!--CONTACT NUMBER - EMAIL-->
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="_contactnum" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="contactnum" id="_contactnum" placeholder="Contact Number" required>
                            </div>
                            <div class="col">
                                <label for="_email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="_email" placeholder="Email Address" required>
                            </div>
                        </div>              
                    </div>
                    
                    <!--DATE-->
                    <div class="mb-3">
                        <div class="col">
                            <label for="_date" class="form-label">Date/Time</label>
                            <input type="datetime-local" class="form-control" name="datetime" id="_date" required>
                        </div>
                    </div>
        
                    <!--PURPOSE-->
                    <div class="mb-3">
                        <label for="_purpose" class="form-label">Appointment Purpose</label>
                        <select class="form-select" name="purpose" id="_purpose">
                            <option selected value="Vaccination">Vaccination</option> 
                            <option value="Grooming">Grooming</option>
                            <option value="Consultation">Consultation</option>
                            <option value="Surgery">Surgery</option>
                        </select>
                    </div>
        
                    <!--SUBMIT-->
                    <div class="mb-3 d-grid gap-2">
                        <button class="btn btn-success" type="submit">Set Appointment</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
@endsection