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
      <a href="{{ url('/') }}" class="h1"><b>{{config('app.name','LaraStarter')}}</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email', $request->email)}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope" @error('email') style="color:#C82333;" @enderror></span>
            </div>
          </div>
          @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
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
  @error("email") toastr["error"]("{{ $message }}","Error"); @enderror

  @if (Session::has('status'))
  toastr["success"]("{{ session()->get('status'); }}","Success");
  @elseif (Session::has('email'))
    toastr["error"]("{{ session()->get('email'); }}","Error");
  @endif
@endpush