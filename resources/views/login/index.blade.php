<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log Masuk</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
		
</head>
<body class="hold-transition login-page">

@if($errors->any())
    <div style="align:center">
	    <ul>
	
		    @foreach($errors->all() as $error)
		
			    <li style="color:red">{{$error}}</li>
		
		    @endforeach
	
	    </ul>
    </div>
@endif

@if(session()->has('redirectLogin'))
	<p style='color:red'>{{session()->get('redirectLogin')}}</p>
@endif

@if(session()->has('login'))
	<p style='color:red'>{{session()->get('login')}}</p> 
@endif

@if(session()->has('status'))
	<p style='color:green'>{{session()->get('status')}}</p> 
@endif

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h2 style="margin-top:5px;">Sistem <b>i-KiLaS</b></h2>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Log masuk ke sistem</p>

      <form action="{{route('login.process')}}" method="post">@csrf
        <div class="input-group mb-3">
          <input type="text" name="no_kp" class="form-control" placeholder="No.I/C">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" id="showpass" class="form-control" placeholder="Katalaluan">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <input type="checkbox" onclick="showPass()">&nbsp;Tunjuk Katalaluan<br><br>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Log Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="{{route('forgotpassword.index')}}">Lupa Katalaluan</a>
      </p>
      <p class="mb-0">
        <a href="{{route('register.index')}}" class="text-center">Daftar akaun baharu</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
