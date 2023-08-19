
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('laraStarter::layouts.auth.templates.header')
</head>
<body class="hold-transition @yield('bodyClass')">

    @yield('content')

@include('laraStarter::layouts.auth.templates.footer')
</body>
</html>