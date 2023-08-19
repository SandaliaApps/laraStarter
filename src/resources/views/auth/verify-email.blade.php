<!-- Extends Master layout-->
@extends('laraStarter::layouts.auth.master')

@push('css')
  <!-- Page Specific CSS code or files goes here-->
@endpush

<!-- Page body class-->
@section('bodyClass','login-page')

<!-- Page Title-->
@section('title','Verify')

@section('content')
<!-- Page Contents goes here-->

<div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('home') }}" class="h1"><b>{{config('app.name','LaraStarter')}}</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?</p>
        @if (session('status') == 'verification-link-sent')
        <p class="login-box-msg"> A new verification link has been sent to the email address you provided during registration.</p>
        @endif
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block mb-2">{{ __('Resend Verification Email') }}</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-primary btn-block">{{ __('Log Out') }}</button>
        </form>
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
  toastr["success"]("Registration successful","Success");
@endpush