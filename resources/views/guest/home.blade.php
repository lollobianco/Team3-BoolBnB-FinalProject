<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
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
