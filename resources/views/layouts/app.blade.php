<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  {{-- Bootstrap --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  {{-- FonTAWSOME --}}
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.css'
    integrity='sha512-+ouAqATs1y4kpPMCHfKHVJwf308zo+tC9dlEYK9rKe7kiP35NiP+Oi35rCFnc16zdvk9aBkDUtEO3tIPl0xN5w=='
    crossorigin='anonymous' />


  {{-- TOM TOM --}}
  {{-- Map --}}
  <link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps.css" />
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps-web.min.js"></script>

  {{-- Search --}}
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12/SearchBox-web.js"></script>
  <link rel="stylesheet" type="text/css"
    href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12/SearchBox.css" />


  <link rel="stylesheet" type="text/css"
    href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css" />
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
  </script>
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
  </script>

</head>

<body>
  <div class="d-flex flex-column ">

    <div id="app"
      class="container-fluid container-nav position-fixed d-flex justify-content-center align-items-center navz-index z-index-nav">

      <div class="row navbar-80 d-flex justify-content-center align-items-center">
        <div class="d-flex justify-content-center justify-content-center align-items-center">
          {{-- LOGO --}}
          <div class="logo-cont">
            <a href="/">
              <img src="{{ asset('assets/logo-v2.svg') }}" alt="logo">
            </a>
          </div>

      

          {{-- MENU --}}
          {{-- <div class="m-auto search">
            <form class="d-flex text-center" role="search">
              <input class="form-control me-2 rounded-5 search-border-pink" type="search" placeholder="Search"
                aria-label="Search">
              <button class="btn btn-login-register rounded-circle" type="submit"><i
                  class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </div> --}}

          {{-- DROP DOWN --}}
          {{-- <div class="dropdown">
            <button class="btn btn-light rounded-4 dropdown-toggle d-flex align-items-center" type="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-bars"></i>
              <div class="ms-2 p-2">
                <i class="fa-solid fa-user"></i>
              </div>

            </button>
            <ul class="dropdown-menu rounded-4">
              <li><a class="dropdown-item" href="/admin/apartments"><i class="fa-solid mr-1 fa-house"></i>
                  Apartments</a>
              </li>
              <li><a class="dropdown-item" href=""><i class="fa-solid mr-1 fa-table-columns"></i>
                  Dashoard</a></li>
              <li><a class="dropdown-item" href="{{ route('admin.apartments.create') }}"><i
                    class="fa-solid mr-1 fa-plus"></i> Add</a></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fa-solid mr-1 fa-right-from-bracket"></i>
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>

            </ul>
          </div> --}}
        </div>

      </div>
    </div>

    <main class="">

      <div class="d-flex align-items-center sidebar-height position-fixed">
        <div class="sidebar-container rounded-4 ml-2 py-4 px-2">
          <div class="nav nav-flush text-center">
            <div class="nav-item d-flex flex-column align-items-center position-stiky">
              <div>
                <a href="/admin/apartments" class="nav-link active p-0">
                  <button type="button"
                    class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn mb-3"
                    data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                    data-mdb-content="My Apartment" data-mdb-trigger="hover">
                    <i class="fas side-ico fa-house-user"></i>
                  </button>
                </a>
                <a href="{{ route('admin.apartments.create') }}" class="nav-link active p-0">
                  <button type="button"
                    class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn mb-3"
                    data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                    data-mdb-content="Create Apartment" data-mdb-trigger="hover">
                    <i class="fas fa-plus side-ico"></i>
                  </button>
                </a>
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link active p-0">
                  <button type="button"
                    class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn mb-3"
                    data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                    data-mdb-content="Dashboard" data-mdb-trigger="hover">
                    <i class="fa-solid side-ico fa-table-columns"></i>
                  </button>
                </a>
              </div>

              <div>
                <a class="nav-link active p-0 align-self-end" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <button type="button"
                    class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn"
                    data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                    data-mdb-content="Logout" data-mdb-trigger="hover">
                    <i class="fa-solid side-ico fa-right-from-bracket"></i>
                  </button>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      @yield('content')

      <div class="sidebar-height-mobile w-100 py-3 px-3">

        <div class="sidebar-container-mobile rounded-4 py-3 px-3">

          <div class="nav nav-flush text-center">

            <div class="nav-item w-100">

              <div class="d-flex justify-content-between align-items-center w-100">
                <a href="/admin/apartments" class="nav-link active p-0">
                  <button type="button"
                    class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn"
                    data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                    data-mdb-content="My Apartment" data-mdb-trigger="hover">
                    <i class="fas side-ico fa-house-user"></i>
                  </button>
                </a>
                <a href="{{ route('admin.apartments.create') }}" class="nav-link active p-0">
                  <button type="button"
                    class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn"
                    data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                    data-mdb-content="Create Apartment" data-mdb-trigger="hover">
                    <i class="fas fa-plus side-ico"></i>
                  </button>
                </a>
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link active p-0">
                  <button type="button"
                    class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn"
                    data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                    data-mdb-content="Dashboard" data-mdb-trigger="hover">
                    <i class="fa-solid side-ico fa-table-columns"></i>
                  </button>
                </a>
                <div>
                  <a class="nav-link active p-0 align-self-end" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <button type="button"
                      class="btn d-flex flex-align-center justify-content-center btn-light rounded-4 side-btn"
                      data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right"
                      data-mdb-content="Logout" data-mdb-trigger="hover">
                      <i class="fa-solid side-ico fa-right-from-bracket"></i>
                    </button>
                  </a>
  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </div>


            </div>

          </div>

        </div>

      </div>

    </main>
  </div>
  @stack('script')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
