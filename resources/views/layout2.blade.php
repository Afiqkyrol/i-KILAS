<!DOCTYPE html>
<html>
	<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/logo_mpklang.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

		@yield('head')
		
	</head>
	<body class="sidebar-mini layout-fixed layout-navbar-fixed sidebar-collapse sidebar-collapse">
     

    <div class="wrapper">


    @php

        
        $nokp = $_SESSION["nokp"];
        $user = \App\Models\User::where('nokp','=',$nokp)->first();


    @endphp




  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('profile.view')}}" class="nav-link">{{ $user->fullname }}</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          MAJLIS PERBANDARAN KLANG
      </li>
    </ul>
      
    </ul>
  </nav>
  <!-- /.navbar -->

      <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.dashboard')}}" class="brand-link">
      <img src="{{asset('dist/img/logo_mpklang.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-5" style="opacity: .8">
      <span class="brand-text font-weight-light">i-KiLaS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ $user->fullname }}</a>
        </div>
      </div>-->

        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Permohonan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('borang.lamanweb1')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Borang Kemaskini Laman Web</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('borang-kemaskini.borangaduan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Borang Kemaskini Aduan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Senarai
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('senarai.permohonan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Senarai Permohonan Saya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('senarai.permohonanJabatan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Senarai Permohonan Jabatan</p>
                </a>
              </li>

              @php if($user->jabatan == "JABATAN TEKNOLOGI MAKLUMAT") { @endphp

              <li class="nav-item">
                <a href="{{route('laporan.utama')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Senarai Laporan</p>
                </a>
              </li>

              @php } @endphp

            </ul>
          </li>
          <li class="nav-item">

            @php if($user->jawatan != "lain-lain" || $user->jabatan == "JABATAN TEKNOLOGI MAKLUMAT" || $user->jabatan == "JABATAN KOMUNIKASI KORPORAT") { @endphp

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Tindakan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            @php } @endphp

            <ul class="nav nav-treeview">

              @php if($user->jawatan == "penyelia") { @endphp

              <li class="nav-item">
                <a href="{{route('senarai.semakan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semakan</p>
                </a>
              </li>

              @php } @endphp

              @php if($user->jawatan == "pengarah") { @endphp

              <li class="nav-item">
                <a href="{{route('senarai.pengesahan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengesahan</p>
                </a>
              </li>

              @php } @endphp

              @php if ($user->jabatan == "JABATAN TEKNOLOGI MAKLUMAT" || $user->jabatan == "JABATAN KOMUNIKASI KORPORAT") { @endphp

              <li class="nav-item">
                <a href="{{route('senarai.kemaskini')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kemaskini</p>
                </a>
              </li>

              @php } @endphp

            </ul>
          </li>

          @php if ($user->jabatan == "JABATAN TEKNOLOGI MAKLUMAT") { @endphp

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Selenggara
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('useredit.jtmsearch')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Selenggara Pengguna</p>
                </a>
              </li>
            </ul>
          </li>

          @php } @endphp
          <li>

            <a href="{{route('logout')}}" style="margin-bottom:5px; color:white; text-align:left; font-size:17px; position:fixed; bottom: 0;" class="nav-link btn btn-danger btn-sm">
              &nbsp&nbsp<i class="nav-icon fas fa-sign-out-alt"></i>
              <p>&nbsp&nbspLog Keluar</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        @yield('body')
<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
    </section>
  
  </div>


   
        

</div>		

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

	</body>
</html>
