<!--NAVBAR-->
<nav class="navbar sticky-top navbar-expand-lg navbar-light shadow p-3 bg-white w-auto">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ URL('/') }}">
            <!--NAVBAR LOGO-->
            <img src="{{ URL::to('/img/ClinicLogo.png') }}" alt="Clinic Logo" width="75" height="75" class="d-inline-block align-text-center">
            <span class="h5 ms-3">Vetrakz Animal Clinic</span>
            <!--NAVBAR LOGO-->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link pe-4" href="/#features">Featured Services</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link pe-4" href="/#announcements">Announcements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pe-4" href="/#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pe-4" href="/helpful-articles">Helpful Articles</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle pe-4" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Portal
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <!-- Authentication Links -->
                        <!--GUESTS-->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest

                        @auth
                            <li class="nav-item">
                                @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff' || Auth::user()->user_type == 'vet')
                                    <a class="dropdown-item" href="{{ route('dashboard') }}" role="button">
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item" href="/help">
                                        Help
                                    </a>
                                @else
                                <a class="dropdown-item" href="/client-profile/{{ Auth::user()->id }}">
                                    My Profile
                                </a>
                                <a class="dropdown-item" href="/help-page">
                                    Help
                                </a>
                                @endif
                            
                                <a class="dropdown-item" href="{{ route('login.out') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            
                                <form id="logout-form" action="{{ route('login.out') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                    </ul>
                  </li>
            </ul>
            <a type="button" class="btn btn-success" href="/set-appointment">Request an Appointment</a>
        </div>
    </div>
</nav>