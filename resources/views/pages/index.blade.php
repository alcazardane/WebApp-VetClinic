@extends('layouts.layout')

@section('_content')
<header id="header" class="py-5 bg-success bg-gradient">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center my-5">
                    <p class="display-5 fw-bold text-white mb-2">
                        Welcome to Vetrakz Animal Clinic!
                    </p>
                    <p class="lead text-white-50 mb-4">
                        "Your Pet Baby's Health Is Our Primary Concern."
                    </p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a href="/set-appointment" class="btn btn-outline-light btn-lg px-4 me-sm-3">
                            Request Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<main>
    <section class="py-5 p-5">
        <figure class="lead text-center">
            Vetrakz Animal Clinic has provided dog and cat care for over
            three years located in Bagumbong, Caloocan North. Our clinic
            provides veterinary care including consultation, treatment, grooming,
            surgery, confinement, vaccination, ultrasound, dental services
            and veterinary products to ensure your pet is healthy and happy!
        </figure>
    </section>
    
    <section id="features" class="py-5 border-bottom bg-success bg-gradient mb-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 text-white text-center mb-5">
                <h4 class="display-6">Featured Services</h4>
            </div>
            <div class="row gx-5 text-white">
                
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                        <img class="img-fluid rounded" src="/img/Vaccination.jpg">
                    </div>
                    <h2>
                        Vaccination
                    </h2>
                    <p>Vaccination Service</p>
                    <a href="/set-appointment" class="btn btn-outline-light text-decoration-none">
                        Request Appointment
                    </a>
                </div>
    
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                        <img class="img-fluid rounded" src="/img/Deworming.jpg">
                    </div>
                    <h2>
                        Deworming
                    </h2>
                    <p>Deworming Service</p>
                    <a href="/set-appointment" class="btn btn-outline-light text-decoration-none">
                        Request Appointment
                    </a>
                </div>
    
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                        <img class="img-fluid rounded" src="/img/Grooming.jpg">
                    </div>
                    <h2>
                        Grooming
                    </h2>
                    <p>Grooming Service</p>
                    <a href="/set-appointment" class="btn btn-outline-light text-decoration-none">
                        Request Appointment
                    </a>
                </div>
    
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                        <img class="img-fluid rounded" src="/img/Ultrasound.png">
                    </div>
                    <h2>
                        Ultrasound
                    </h2>
                    <p>Ultrasound Service</p>
                    <a href="/set-appointment" class="btn btn-outline-light text-decoration-none">
                        Request Appointment
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <section class="container" id="announcements">
        <p class="text-center display-6 mb-5">Announcements</p> 
        <div class="list-group list-group-flush mb-3 mt-3">
            @if (count($pubs) >= 1)
                @foreach ($pubs as $pub)
                    @if ($pub->status == "shown")
                        <div class="list-group-item d-flex w-100 justify-content-between mb-5" aria-current="true">
                                <p><b class="h4" style="color: #58753C">{{ $pub->title }}</b><br>{!! $pub->body !!}</p>
                            @if ($pub->coverimage != NULL)
                                <div class="col-md-4 col-sm-4">
                                    <img class="img-fluid" src="/storage/coverimages/{{ $pub->coverimage }}">
                                </div>
                            @endif     
                        </div>
                    @endif
                @endforeach
            @else
                <p>No Announcements</p>
            @endif
        </div> 
    </section>
    
    <section id="services" class="py-5 border-bottom bg-success bg-gradient mb-2">
        <div class="container px-5 my-5">
            <div class="row gx-5 text-white text-center mb-5">
                <h4 class="display-6">Services</h4>
            </div>
            <div class="row gx-5 text-white">
    
                <div class="col-lg-3 mb-5 mt-3 mb-lg-0 text-center">
                    <div class="text-white rounded-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-chat-right-dots-fill" viewBox="0 0 16 16">
                            <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </svg>
                    </div>
                    <p class="fs-5">Consultation</p>
                </div>
    
                <div class="col-lg-3 mb-5 mt-3 mb-lg-0 text-center">
                    <div class="text-white rounded-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bandaid-fill" viewBox="0 0 16 16">
                            <path d="m2.68 7.676 6.49-6.504a4 4 0 0 1 5.66 5.653l-1.477 1.529-5.006 5.006-1.523 1.472a4 4 0 0 1-5.653-5.66l.001-.002 1.505-1.492.001-.002Zm5.71-2.858a.5.5 0 1 0-.708.707.5.5 0 0 0 .707-.707ZM6.974 6.939a.5.5 0 1 0-.707-.707.5.5 0 0 0 .707.707ZM5.56 8.354a.5.5 0 1 0-.707-.708.5.5 0 0 0 .707.708Zm2.828 2.828a.5.5 0 1 0-.707-.707.5.5 0 0 0 .707.707Zm1.414-2.121a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707Zm1.414-.707a.5.5 0 1 0-.706-.708.5.5 0 0 0 .707.708Zm-4.242.707a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707Zm1.414-.707a.5.5 0 1 0-.707-.708.5.5 0 0 0 .707.708Zm1.414-2.122a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707ZM8.646 3.354l4 4 .708-.708-4-4-.708.708Zm-1.292 9.292-4-4-.708.708 4 4 .708-.708Z"/>
                        </svg>
                    </div>
                    <p class="fs-5">Treatment</p>
                </div>
    
                <div class="col-lg-3 mb-5 mt-3 mb-lg-0 text-center">
                    <div class="text-white rounded-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-scissors" viewBox="0 0 16 16">
                            <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61 3.5 3.5zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0zm7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                        </svg>
                    </div>
                    <p class="fs-5">Grooming</p>
                </div>
    
                <div class="col-lg-3 mb-5 mt-3 mb-lg-0 text-center">
                    <div class="text-white rounded-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
                        </svg>
                    </div>
                    <p class="fs-5">Surgery</p>
                </div>
    
                <div class="col-lg-3 mb-5 mt-3 mb-lg-0 text-center">
                    <div class="text-white rounded-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                            <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                        </svg>
                    </div>
                    <p class="fs-5">Confinement</p>
                </div>
    
                <div class="col-lg-3 mb-5 mt-3 mb-lg-0 text-center">
                    <div class="text-white rounded-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-file-medical" viewBox="0 0 16 16">
                            <path d="M8.5 4.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L7 6l-.549.317a.5.5 0 1 0 .5.866l.549-.317V7.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L9 6l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V4.5zM5.5 9a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                        </svg>
                    </div>
                    <p class="fs-5">Vaccination</p>
                </div>
    
                <div class="col-lg-3 mb-5 mt-3 mb-lg-0 text-center">
                    <div class="text-white rounded-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-soundwave" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8.5 2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-1 0v-11a.5.5 0 0 1 .5-.5zm-2 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm-6 1.5A.5.5 0 0 1 5 6v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm8 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm-10 1A.5.5 0 0 1 3 7v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5zm12 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </div>
                    <p class="fs-5">Ultrasound</p>
                </div>
    
                <div class="col-lg-3 mb-5 mt-3 mb-lg-0 text-center">
                    <div class="text-white rounded-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z"/>
                        </svg>
                    </div>
                    <p class="fs-5">Dental Service</p>
                </div>
                
                <div class="col-lg-3 mb-5 mt-3 mb-lg-0 text-center">
                    <div class="text-white rounded-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-basket2-fill" viewBox="0 0 16 16">
                            <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1z"/>
                        </svg>
                    </div>
                    <p class="fs-5">Veterinary Product</p>
                </div>
    
                <div class="col-lg-3 mb-5 mt-3 mb-lg-0 text-center">
                    <div class="text-white rounded-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                        </svg>
                    </div>
                    <p class="fs-5">Pet Supplies</p>
                </div>
    
                <div class="col-lg-3 mb-5 mt-3 mb-lg-0 text-center">
                    <div class="text-white rounded-3 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </div>
                    <p class="fs-5">Home Service</p>
                </div>
    
            </div>
        </div>
    </section>
</main>
@endsection