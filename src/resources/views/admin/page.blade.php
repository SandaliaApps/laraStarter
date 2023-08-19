<!-- Extends Master layout-->
@extends('laraStarter::layouts.admin.master')

@push('css')
  <!-- Page Specific CSS code or files goes here-->
@endpush

<!-- Page body class-->
@section('bodyClass','')

<!-- Page Title-->
@section('title','Page')

@section('content')
<!-- Page Contents goes here-->
@endsection

@push('js')
  <!-- Page Specific js code or files goes here-->
@endpush

@push('alert')
  <!-- Page Specific alert-->
@endpush