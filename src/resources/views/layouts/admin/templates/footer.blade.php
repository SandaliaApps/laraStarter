<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2014-2021 <a href="https://sandalia.com.bd/apps">Sandalia Apps</a>.</strong> All rights reserved.
</footer>
</div>

<!-- jQuery -->
<script src="{{asset('vendor/laraStarter/assets/vendor/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('vendor/laraStarter/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('vendor/laraStarter/assets/js/adminlte.min.js')}}"></script>
<!-- Toastr Js -->
<script src="{{asset('vendor/laraStarter/assets/vendor/CodeSeven-toastr-2.1.4-7/toastr.min.js')}}"></script>

@stack('js')

<script>
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  @stack('alert')

  @if (Session::has('error'))
    toastr["error"]("{{ session()->get('error'); }}","Error");
  @elseif (Session::has('success'))
    toastr["success"]("{{ session()->get('success'); }}","Success");
  @endif
</script>