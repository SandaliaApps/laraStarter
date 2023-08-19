<title>{{config('app.name','LaraStarter')}} | @yield('title')</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('vendor/laraStarter/assets/vendor/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('vendor/laraStarter/assets/css/adminlte.min.css')}}">
<!-- Toastr style -->
<link rel="stylesheet" href="{{asset('vendor/laraStarter/assets/vendor/CodeSeven-toastr-2.1.4-7/toastr.min.css')}}">

@stack('css')