<!-- Extends Master layout-->
@extends('laraStarter::layouts.auth.master')

@push('css')
  <!-- Page Specific CSS code or files goes here-->
@endpush

<!-- Page body class-->
@section('bodyClass','login-page')

<!-- Page Title-->
@section('title','Forgot')

@section('content')
<!-- Page Contents goes here-->

<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('home') }}" class="h1"><b>{{config('app.name','LaraStarter')}}</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <form action="{{ route('password.update') }}" method="post">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
          <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" value="{{old('password_confirmation', $request->password_confirmation)}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" @error('password_confirmation') style="color:#C82333;" @enderror></span>
            </div>
          </div>
          @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{ route('login') }}">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@endsection

@push('js')
  
@endpush

@push('alert')
  <!-- Page Specific js code or files goes here-->
  @error("password") toastr["error"]("{{ $message }}","Error"); @enderror
  @error("password_confirmation") toastr["error"]("{{ $message }}","Error"); @enderror

  @if (Session::has('status'))
  toastr["success"]("{{ session()->get('status'); }}","Success");
  @elseif (Session::has('email'))
    toastr["error"]("{{ session()->get('email'); }}","Error");
  @endif
@endpush

