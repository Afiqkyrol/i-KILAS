@extends('layout2')

@section('head')

<title>PERMOHONAN KEMASKINI ADUAN</title>

@endsection

@section('body')

<br>

<div style="padding-right:50px; padding-left:50px">

<br>

<div class="card" >



<form method="POST" action="{{ route('borang-kemaskini.storeaduan') }}" enctype="multipart/form-data">

<h2 class="card-header">
@csrf

<div style="display:flex;">

<div style="width:5%;">
<a href="{{route('dashboard.dashboard')}}" class="btn btn-primary btn-sm">Back</a>
</div>

<div style="width:95%;">
<center><b>BORANG PERMOHONAN KEMASKINI ADUAN JABATAN</b></center>
</div>

</div></h2>

<div class="card-body">
<div style="display:flex">
<div style="width:20%"></div>
<div style="width:80%">

<br>

@if($errors->any())
<div>
	<ul style="padding-left:100px">
	
		@foreach($errors->all() as $error)
		
			<li style="color:red">{{$error}}</li>
		
		@endforeach
	
	</ul>
</div>
@endif

<br>

<label style="">NAMA PENGADU: </label> &nbsp; {{$user->fullname}}
<input style="width:400px" type="hidden" name="nama_pengadu" value="{{$user->fullname}}"/><br><br>


<label style="">JABATAN/BAHAGIAN: </label> &nbsp; {{$user->jabatan}}
<input style="width:400px" type="hidden" name="jabatan" value="{{$user->jabatan}}"/>
<br><br>


<label style="">NO RUJUKAN: </label>
<input style="width:300px" type="text" name="no_rujukan" value="{{ old('no_rujukan') }}" /><br><br>


<label style="">JENIS ADUAN: </label><br>

<div style="">
<input type="radio" name="jenis_aduan" value="Maklumat Tidak Dikemaskini"> MAKLUMAT TIDAK DIKEMASKINI <br>
<input type="radio" name="jenis_aduan" value="Modul Tidak Berfungsi"> MODUL TIDAK BERFUNGSI<br>
</div>

<br>

<label style="">KETERANGAN ADUAN: </label><br>
<div style="" ><textarea style="width:650px; height:150px;" type="text" name="keterangan_aduan"
>{{ old('keterangan_aduan') }}</textarea></div><br>



<br><label style="">MUAT NAIK GAMBAR/DOKUMEN: </label><br>
<div style=""><input type="file" name="zipdoc" value="" ><input type="file" name="zipdoc2" value="" ></div><br>
<div style=""><input type="file" name="zipdoc3" value="" ><input type="file" name="zipdoc4" value="" ></div><br>
<div style=""><input type="file" name="zipdoc5" value="" ><input type="file" name="zipdoc6" value="" ></div><br>

<hr>

</div>
</div>

<div style="text-align:center; "><button class="btn btn-success btn-sm" type="submit">SUBMIT</button></div>


</form>

</div>

</div>

</div>

<br><br>



@endsection
