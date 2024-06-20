@extends('layout2')

@section('head')

<title>Borang Permohonan Kemaskini Laman Web</title>

@endsection

@section('body')

<br>

<div style="padding-right:50px; padding-left:50px">

<br>

<div class="card" >



<form method="POST" action="{{route('borang.lamanweb2')}}">

<h2 class="card-header">
@csrf

<div style="display:flex;">

<div style="width:5%;">
<a href="{{route('dashboard.dashboard')}}" class="btn btn-primary btn-sm">Back</a>
</div>

<div style="width:95%;">
<center><b>Borang Permohonan Kemaskini Laman Web 1/3</b></center>
</div>

</div></h2>

<div class="card-body">

    <div style="display:flex">
    <div style="width:20%"></div>
    <div style="width:80%">

    @if($errors->any())
    <div style="padding-left:100px">
	    <ul>
	
		    @foreach($errors->all() as $error)
		
			    <li style="color:red">{{$error}}</li>
		
		    @endforeach
	
	    </ul>
    </div>
    @endif


    @if(session()->has('form'))
	    <center><p style='color:red'>{{ session()->get('form') }}</p></center>
    @endif

    <br>
    <label style=""><b>NAMA PEMOHON: </b></label>  &nbsp; {{$user->fullname}}
    <input style="width:400px" type="hidden" name="name" value="{{$user->fullname}}"/><br><br><br>


    <label style=""><b>JABATAN/BAHAGIAN/UNIT: </b></label> &nbsp; {{$user->jabatan}}
    <input style="width:400px" type="hidden" name="jabatan" value="{{$user->jabatan}}"/><br><br><br>

    <label style=""><b>KATEGORI SALURAN: </b></label><br><br>

    <div style="">
    <input type="checkbox" name="kategori_saluran1" value="Laman Web"> LAMAN WEB
    <input style="margin-left:30px" type="checkbox" name="kategori_saluran2" value="Portal Akses"> PORTAL AKSES
    <input style="margin-left:30px" type="checkbox" name="kategori_saluran3" value="Facebook"> FACEBOOK
    <input style="margin-left:30px" type="checkbox" name="kategori_saluran_lain-lain" value="lainlain"> LAIN-LAIN (NYATAKAN)
    <input type="text" name="kategori_saluran_ruangan" ><br><br><br>
    </div>

    </div>
    </div>

    <center><button style="text-align:center" class="btn btn-success btn-sm" type="submit">Next</button></center>

</form>
</div>

</div>

</div>



@endsection
