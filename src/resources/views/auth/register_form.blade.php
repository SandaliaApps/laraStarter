<!-- Extends Master layout-->
@extends('laraStarter::layouts.auth.master')

@push('css')
  <!-- Page Specific CSS code or files goes here-->
  <script src="https://www.google.com/recaptcha/api.js?render={{ config('laraStarter.recaptcha.site_key') }}"></script>
@endpush

<!-- Page body class-->
@section('bodyClass','register-page')

<!-- Page Title-->
@section('title','Register')

@section('content')
<!-- Page Contents goes here-->

<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ url('/') }}" class="h1"><b>{{config('app.name','LaraStarter')}}</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('register') }}" method="post" id="register">
        @csrf
        <input type="hidden" name="g-token" id="g-token">
        <div class="input-group mb-3">
          <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="Full name" value="{{old('name', $request->name)}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user" @error('name') style="color:#C82333;" @enderror></span>
            </div>
          </div>
          @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
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
        <div class="input-group mb-3">
          <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Retype password" value="{{old('password_confirmation', $request->password_confirmation)}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" @error('password_confirmation') style="color:#C82333;" @enderror></span>
            </div>
          </div>
          @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="input-group mb-3">
              <div class="icheck-primary">
                <input type="checkbox" checked id="agreeTerms" disabled>
                <label for="agreeTerms" style="color:#23c84c;">
                I agree to the
                </label>
                <strong><a href="#">terms</a></strong>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="{{route('login')}}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@endsection

@push('js')
<script>
  grecaptcha.ready(function() {
    grecaptcha.execute('{{ config('laraStarter.recaptcha.site_key') }}', {action: 'register'}).then(function(token) {
        // Add your logic to submit to your backend server here.
        document.getElementById("g-token").value = token;
        //document.getElementById("login").submit();
    });
  });
</script>
@endpush

@push('alert')
  <!-- Page Specific js code or files goes here-->
  @error("name") toastr["error"]("{{ $message }}","Error"); @enderror
  @error("terms") toastr["error"]("{{ $message }}","Error"); @enderror
  @error("email") toastr["error"]("{{ $message }}","Error"); @enderror
  @error("password") toastr["error"]("{{ $message }}","Error"); @enderror
  @error("password_confirmation") toastr["error"]("{{ $message }}","Error"); @enderror
  @error("g-token") toastr["error"]("{{ $message }}","Error"); @enderror

  @if (Session::has('status'))
  toastr["success"]("{{ session()->get('status'); }}","Success");
  @elseif (Session::has('name'))
    toastr["error"]("{{ session()->get('name'); }}","Error");
  @elseif (Session::has('email'))
    toastr["error"]("{{ session()->get('email'); }}","Error");
  @elseif (Session::has('password'))
    toastr["error"]("{{ session()->get('password'); }}","Error");
  @elseif (Session::has('password_confirmation'))
    toastr["error"]("{{ session()->get('password_confirmation'); }}","Error");
  @elseif (Session::has('g-token'))
    toastr["error"]("{{ session()->get('g-token'); }}","Error");
  @endif
  
@endpush