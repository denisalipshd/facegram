<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

    @yield('content')

<script src="{{ asset('assets/bootstrap.bundle.min.js') }}"></script>
</script>
</body>
</html>
