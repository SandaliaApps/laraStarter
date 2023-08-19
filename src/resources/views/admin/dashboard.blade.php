@extends('laraStarter::layouts.admin.master')

@push('css')
    <!-- DataTables -->
<link rel="stylesheet" href="{{asset('vendor/laraStarter/assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/laraStarter/assets/vendor/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/laraStarter/assets/vendor/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('bodyClass','sidebar-mini')

@section('title','Dashboard')

@section('content')
  <div class="row mt-3">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>150</h3>

          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="col-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
            <tfoot>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
  </div>
@endsection
@push('js')
  <!-- DataTables  & Plugins -->
  <script src="{{asset('vendor/laraStarter/assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/laraStarter/assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('vendor/laraStarter/assets/vendor/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('vendor/laraStarter/assets/vendor/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('vendor/laraStarter/assets/vendor/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('vendor/laraStarter/assets/vendor/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('vendor/laraStarter/assets/vendor/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('vendor/laraStarter/assets/vendor/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('vendor/laraStarter/assets/vendor/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('vendor/laraStarter/assets/js/demo.js')}}"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      $('#example1').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

    $(document).ready(function(){
      var action = "load_user";
      $.ajax({
            url:"{{ route('ajax') }}",
            type:"GET",
            data:{action:action},
            success:function(data){
              $("#tbody").html(data);
            }
      });
    });
  </script>
  
@endpush