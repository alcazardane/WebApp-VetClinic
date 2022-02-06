<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="{{ URL('css\app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ URL::to('/img/favicon-16x16.png') }}"/>
    <title>FurCare</title>
</head>

<body>
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar bg-white">
          <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-5">
                @yield('_routes')
            </div>
          </div>
        </nav>
        <!-- Sidebar -->
      
        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
          <!-- Container wrapper -->
          <div class="container-fluid">
            <!-- Toggle button -->
            <button id="sidebarCollapse" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"aria-label="Toggle navigation">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
            </button>
      
            <!-- Brand -->
            <a class="navbar-brand ms-5" href="#">
                <img 
                    src="{{ URL::to('/img/ClinicLogo.png') }}" 
                    alt="Clinic Logo" 
                    loading="lazy" 
                    width="50" 
                    height="50"
                    class="d-inline-block align-text-center"
                >
                <span class="h5 ms-3">Vetrakz Animal Clinic</span>
            </a>
      
            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">
              <!-- Notification dropdown -->
              <!-- Avatar -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                  href="#"
                  id="navbarDropdownMenuLink"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="/storage/profileimage/{{ Auth::user()->profileimage }}"
                    class="rounded-circle"
                    height="30"
                    alt="Avatar"
                    loading="lazy"
                  />
                  <span class="ms-2 me-2">{{ Auth::user()->name }}</span>
                  
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <li>
                    <a class="dropdown-item" href="{{ route('profile.index') }}">My profile</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>

    <main style="margin-top: 58px;">
        <div class="container-fluid mt-4 p-5">
            <div class="row align-items-start">
                <div class="col align-self-start">
                  @include('inc.message')
                  @yield('tbl_name')
                  @yield('createButton')
                </div>
            </div>
            
            <div class="row">
                <div class="table-responsive mt-2">
                    @yield('tbl_content')
                </div>
            </div>
            @yield('layout_content')
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="script/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript" src="/js/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor({
              toolbar: 'Full',
              enterMode : CKEDITOR.ENTER_BR,
              shiftEnterMode: CKEDITOR.ENTER_P
            });
        });
    </script>
  </body>
</html>