<!-- Extends Master layout-->
@extends('laraStarter::layouts.auth.master')

@push('css')
  <!-- Page Specific CSS code or files goes here-->
  <script src="https://www.google.com/recaptcha/api.js?render={{ config('laraStarter.recaptcha.site_key') }}"></script>
@endpush

<!-- Page body class-->
@section('bodyClass','login-page')

<!-- Page Title-->
@section('title','Login')

@section('content')
<!-- Page Contents goes here-->

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('home') }}" class="h1"><b>{{config('app.name','LaraStarter')}}</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form id="login" method="post" action="{{ route('login') }}">
        @csrf
        <input type="hidden" name="g-token" id="g-token">
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email', $request->email)}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope" @error('email') style="color:#C82333;" @enderror></span>
            </div>
          </div>
          @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{old('password', $request->password)}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" @error('password') style="color:#C82333;" @enderror></span>
            </div>
          </div>
          @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ route('password.request') }}">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{route('register')}}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection

@push('js')
  
  <script>
      grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('laraStarter.recaptcha.site_key') }}', {action: 'login'}).then(function(token) {
            // Add your logic to submit to your backend server here.
            document.getElementById("g-token").value = token;
            //document.getElementById("login").submit();
        });
      });
 </script>
@endpush

@push('alert')
  <!-- Page Specific js code or files goes here-->
  @error("email") toastr["error"]("{{ $message }}","Error"); @enderror
  @error("password") toastr["error"]("{{ $message }}","Error"); @enderror
  @error("g-token") toastr["error"]("{{ $message }}","Error"); @enderror

  @if (Session::has('status'))
  toastr["success"]("{{ session()->get('status'); }}","Success");
  @elseif (Session::has('email'))
    toastr["error"]("{{ session()->get('email'); }}","Error");
  @elseif (Session::has('g-token'))
    toastr["error"]("{{ session()->get('g-token'); }}","Error");
  @endif
@endpush