<!DOCTYPE html>
<html>
	<head>
	    @php

        
        $nokp = $_SESSION["nokp"];
        $user = \App\Models\User::where('nokp','=',$nokp)->first();


        @endphp

		<script src="{{ asset('js/app.js') }}" defer></script>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		@yield('head')
		
	</head>
	<body>

        
		<div id="mySidebar" class="sidebar">
  <div class="d-flex flex-column flex-shrink-0 p-3 " style="width: 280px; height:750px; background-color: #e2ece9;">

    <br>

        
        <div style="padding-left:235px; margin-top:10px; font-size:25px"><a href="javascript:void(0)" class="" onclick="closeNav()">&times;</a></div>

        <h3>Permohonan</h3>

        <ul class="nav flex-column">
            <li style="padding-bottom:5px" class="nav-item">
                <a style="width:250px;" class="btn btn-outline-primary" href="{{route('borang.lamanweb1')}}">Borang Kemaskini Laman Web</a>
            </li>
            <li style="padding-bottom:5px;" class="nav-item">
                <a style="width:250px;" class="btn btn-outline-primary" href="{{route('borang-kemaskini.borangaduan')}}">Borang Kemaskini Aduan</a>
            </li>
        </ul>


        <div><hr></div>

        <h3>Senarai</h3>

        <ul class="nav flex-column">

            <li style="padding-bottom:5px" class="nav-item">
                <a style="width:250px;" class="btn btn-outline-primary" href="{{route('senarai.permohonan')}}">Senarai Permohonan Saya</a>
            </li>
            <li style="padding-bottom:5px" class="nav-item">
                <a style="width:250px;" class="btn btn-outline-primary" href="{{route('senarai.permohonanJabatan')}}">Senarai Permohonan Jabatan</a>
            </li>

            @php if($user->jabatan == "JABATAN TEKNOLOGI MAKLUMAT") { @endphp

            
            <li style="padding-bottom:5px" class="nav-item">
                <a style="width:250px;" class="btn btn-outline-primary" href="{{route('senarai.maklumat')}}">Senarai Maklumat</a>
            </li>
            <li style="padding-bottom:5px" class="nav-item">
                 <a style="width:250px;" class="btn btn-outline-primary" href="{{route('laporan.utama')}}">Laporan</a>
            </li>
        

            @php } @endphp

        </ul>

        <div><hr></div>

        @php if($user->jawatan != "lain-lain" || $user->jabatan == "JABATAN TEKNOLOGI MAKLUMAT") { @endphp
        
        <h3>Tindakan</h3>

        @php } @endphp

        @php if($user->jawatan == "penyelia") { @endphp

        <ul class="nav flex-column">
            <li style="padding-bottom:5px" class="nav-item">
                 <a style="width:250px;" class="btn btn-outline-primary" href="{{route('senarai.semakan')}}">Semakan</a>
            </li>
        </ul>

        @php } @endphp

        @php if($user->jawatan == "pengarah") { @endphp

        <ul class="nav flex-column">
            <li style="padding-bottom:5px" class="nav-item">
                 <a style="width:250px;" class="btn btn-outline-primary" href="{{route('senarai.pengesahan')}}">Pengesahan</a>
            </li>
        </ul>

        

        @php } @endphp

        @php if ($user->jabatan == "JABATAN TEKNOLOGI MAKLUMAT") { @endphp

        <ul class="nav flex-column">
            <li style="padding-bottom:5px" class="nav-item">
                 <a style="width:250px;" class="btn btn-outline-primary" href="{{route('senarai.kemaskini')}}">Kemaskini</a>
            </li>
        </ul>

        @php } @endphp

        @php if($user->jawatan != "lain-lain" || $user->jabatan == "JABATAN TEKNOLOGI MAKLUMAT") { @endphp
        
        <div><hr></div>

        @php } @endphp

        @php if($user->jabatan == "JABATAN TEKNOLOGI MAKLUMAT") { @endphp
        
        <h3>Selenggara</h3>

        @php } @endphp

        @php if($user->jabatan == "JABATAN TEKNOLOGI MAKLUMAT") { @endphp
        
        <ul class="nav flex-column">
            <li style="padding-bottom:5px" class="nav-item">
                 <a style="width:250px;" class="btn btn-outline-primary" href="{{route('useredit.jtmsearch')}}">Selenggara Pengguna</a>
            </li>
        </ul>

        @php } @endphp

        <br>

    </div>

</div>




<nav class="navbar navbar-dark bg-primary sticky-top">

    
    <button style="width:3%; text-align:left;" class="btn btn-primary" onclick="openNav()">&#9776;</button>

    <div style="width:5%; padding-left:5px"><a style="color:white" href="{{route('dashboard.dashboard')}}">i-KiLaS</a></div>

    <div style="color:#e0fbfc; width:52%; border-left: 2px solid white; padding-left:20px"><a style="color:#e0fbfc" href="{{route('profile.view')}}">{{$user->fullname}}</a></div>

    <div style="color:white; width:30%; text-align:right; padding-right:10px">MAJLIS PERBANDARAN KLANG</div>

    <div style="padding-left:10px; border-left: 2px solid white; width:10%">

        <a style="padding-left:25px; padding-right:25px;" href="{{route('logout')}}" class="btn btn-danger btn-sm">Logout</a>

    </div>

</nav>
<div id="main">

@yield('body')

</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	</body>
</html>
