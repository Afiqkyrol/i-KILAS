<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Akaun</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <style>

    body{

        
        
    }
    

  </style>

</head>
<body class="hold-transition register-page">

@if($errors->any())
<div>
	<ul style="align:center">
	
		@foreach($errors->all() as $error)
		
			<li style="color:red">{{$error}}</li>
		
		@endforeach
	
	</ul>
</div>
@endif

<div class="register-box" style="width:60%;">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h2 style="margin-top:5px;">Sistem <b>i-KiLaS</b></h2>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Daftar akaun baharu</p>
      <form action="{{ route('register.store')}}" method="post">@csrf
	    <div class="row">
	      <div class="col-6">
            <div class="input-group mb-3">
              <input type="text" name="fullname" class="form-control" placeholder="Nama Penuh" value="{{old('fullname')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
	      </div>
	      <div class="col-6">
		    <div class="input-group mb-3">
              <input type="text" name="no_kp" class="form-control" placeholder="No.K/P" value="{{old('no_kp')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            </div>
	      </div>
	    </div>
		<div class="row">
		<div class="col-6">
		<div class="input-group mb-3">
          <input type="text" name="no_telefon" class="form-control" placeholder="No.Telefon" value="{{old('no_telefon')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone-square"></span>
            </div>
          </div>
        </div>
		</div>
		<div class="col-6">
		<div class="input-group mb-3">
          <select style="color:grey" class="form-control" name="jantina">
			<option value=""><p>Jantina</p></option>
			<option value="lelaki">Lelaki</option>
			<option value="perempuan">Perempuan</option>
		  </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-venus-mars"></span>
            </div>
          </div>
        </div>
		</div>
		</div>
		
		<div class="row">
		<div class="col-6">
		<div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
		</div>
		<div class="col-6">
		<div class="input-group mb-3">
          <input type="text" name="jabatan" list="list_jabatan" class="form-control" placeholder="Jabatan/Bahagian/Unit" value="{{old('jabatan')}}">
		  <datalist id="list_jabatan">
			   <option value ="JABATAN KHIDMAT PENGURUSAN">JABATAN KHIDMAT PENGURUSAN
			   <option value ="JABATAN KEWANGAN">JABATAN KEWANGAN
			   <option value ="JABATAN KEJURUTERAAN">JABATAN KEJURUTERAAN
			   <option value ="JABATAN PERANCANG BANDAR DAN DESA">JABATAN PERANCANG BANDAR DAN DESA
			   <option value ="JABATAN BANGUNAN">JABATAN BANGUNAN
			   <option value ="JABATAN PENILAIAN">JABATAN PENILAIAN
			   <option value ="JABATAN PENGURUSAN HARTA">JABATAN PENGURUSAN HARTA
			   <option value ="JABATAN UNDANG-UNDANG">JABATAN UNDANG-UNDANG
			   <option value ="JABATAN KEMASYARAKATAN">JABATAN KEMASYARAKATAN
			   <option value ="JABATAN KESIHATAN">JABATAN KESIHATAN
			   <option value ="JABATAN PENGUATKUASA">JABATAN PENGUATKUASA
			   <option value ="JABATAN PELESENAN">JABATAN PELESENAN
               <option value ="JABATAN PENGURUSAN PASAR & PENJAJA">JABATAN PENGURUSAN PASAR & PENJAJA
               <option value ="JABATAN TAMAN DAN REKREASI">JABATAN TAMAN DAN REKREASI
               <option value ="JABATAN KOMUNIKASI KORPORAT">JABATAN KOMUNIKASI KORPORAT
               <option value ="JABATAN TEKNOLOGI MAKLUMAT">JABATAN TEKNOLOGI MAKLUMAT
               <option value ="JABATAN PERKHIDMATAN PERSEKITARAN">JABATAN PERKHIDMATAN PERSEKITARAN
               <option value ="JABATAN PUSAT SETEMPAT (OSC )">JABATAN PUSAT SETEMPAT (OSC )
               <option value ="JABATAN PESURUHJAYA BANGUNAN (COB)">JABATAN PESURUHJAYA BANGUNAN (COB)
               <option value ="BAHAGIAN AUDIT DALAM">BAHAGIAN AUDIT DALAM
               <option value ="BAHAGIAN UKUR BAHAN">BAHAGIAN UKUR BAHAN
               <option value ="UNIT PENYAMPAIAN PERKHIDMATAN (SDU)">UNIT PENYAMPAIAN PERKHIDMATAN (SDU)
               <option value ="UNIT INTEGRITI">UNIT INTEGRITI
		  </datalist>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-briefcase"></span>
            </div>
          </div>
        </div>
		</div>
		</div>
		
		<div class="row">
		<div class="col-6">
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Katalaluan">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		</div>
		<div class="col-6">
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Taip Semula Katalaluan">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		</div>
		</div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('login.index') }}" class="text-center">Log Masuk</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
