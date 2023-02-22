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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.css'
    integrity='sha512-+ouAqATs1y4kpPMCHfKHVJwf308zo+tC9dlEYK9rKe7kiP35NiP+Oi35rCFnc16zdvk9aBkDUtEO3tIPl0xN5w=='
    crossorigin='anonymous' />
</head>

<body>
  <div id="app" class="container-fluid py-3 container-nav d-flex justify-content-center align-items-center">
    <div class="row navbar-80 d-flex justify-content-center align-items-center">
      <div class="d-flex justify-content-between justify-content-center align-items-center">
        {{-- LOGO --}}
        <div class="logo-cont">
          <a href="/">
            <img src="{{ asset('assets/Logo.svg') }}" alt="logo">
          </a>
        </div>

        {{-- MENU --}}
        <div class="m-auto">
          <form class="d-flex text-center" role="search">
            <input class="form-control me-2 rounded-5 search-border-pink" type="search" placeholder="Search"
              aria-label="Search">
            <button class="btn btn-login-register rounded-circle" type="submit"><i
                class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div>

        {{-- DROP DOWN --}}
        <div class="dropdown">
          <button class="btn btn-light rounded-4 dropdown-toggle d-flex align-items-center" type="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-bars"></i>
            <div class="ms-2 p-2">
              <i class="fa-solid fa-user"></i>
            </div>

          </button>
          <ul class="dropdown-menu rounded-4">
            <li><a class="dropdown-item" href="/admin/apartments"><i class="fa-solid mr-1 fa-house"></i> Apartments</a>
            </li>
            <li><a class="dropdown-item" href=""><i class="fa-solid mr-1 fa-table-columns"></i> Dashoard</a></li>
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
        </div>
      </div>

    </div>
  </div>

  <main class="">
    @yield('content')
  </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
</body>

</html>
