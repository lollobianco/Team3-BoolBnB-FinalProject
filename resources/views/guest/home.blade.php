<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.css'
    integrity='sha512-+ouAqATs1y4kpPMCHfKHVJwf308zo+tC9dlEYK9rKe7kiP35NiP+Oi35rCFnc16zdvk9aBkDUtEO3tIPl0xN5w=='
    crossorigin='anonymous' />
  <link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps.css" />
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps-web.min.js"></script>

  {{-- Search --}}
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12/SearchBox-web.js"></script>
  <link rel="stylesheet" type="text/css"
    href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12/SearchBox.css" />


  <link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css" />
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
  </script>
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
  </script>
  <title></title>
</head>

<body>

  <div id="root">

    @if (Auth::check())
      <script>
        window.authUser = {!! json_encode(Auth::user()) !!};
      </script>
    @else
      <script>
        window.authUser = null;
      </script>
    @endif

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
</body>

</html>
